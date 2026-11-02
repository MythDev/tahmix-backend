<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use App\Models\Matchs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function dailyMatches()
    {
        $matches = Matchs::whereDate('match_date', '>=', Carbon::today())
            ->whereNotNull('prediction')
            ->orderBy('match_date', 'asc')
            ->get(); // ->with('favoritedBy') KALDIRILDI!

        return response()->json(['data' => MatchResource::collection($matches)]);
    }

    public function history()
    {
        $matches = Matchs::whereIn('prediction_status', ['won', 'lost'])
            ->orderBy('match_date', 'desc')
            ->limit(30)
            ->get();

        return MatchResource::collection($matches);
    }

    public function statistics()
    {
        $totalPredictions = Matchs::whereIn('prediction_status', ['won', 'lost'])->count();
        $wonPredictions = Matchs::where('prediction_status', 'won')->count();

        $winRate = $totalPredictions > 0 ? round(($wonPredictions / $totalPredictions) * 100, 2) : 0;
        $averageOdds = Matchs::where('prediction_status', 'won')->avg('odds');

        return response()->json([
            'total_matches' => $totalPredictions,
            'won_matches' => $wonPredictions,
            'win_rate' => $winRate,
            'average_winning_odds' => round($averageOdds, 2) ?? 0,
        ]);
    }

    public function toggleFavorite(Request $request, $matchId)
    {
        $user = $request->user();

        if ($user->favorites()->where('match_id', $matchId)->exists()) {
            $user->favorites()->detach($matchId);
            return response()->json(['message' => 'Favorilerden çıkarıldı', 'is_favorite' => false]);
        } else {
            $user->favorites()->attach($matchId);
            return response()->json(['message' => 'Favorilere eklendi', 'is_favorite' => true]);
        }
    }

    public function favorites(Request $request)
    {
        $matches = $request->user()
            ->favorites()
            ->where('match_date', '>=', Carbon::now())
            ->orderBy('match_date', 'asc')
            ->get();

        return response()->json(['data' => MatchResource::collection($matches)]);
    }

    public function vipMatches()
    {
        $matches = Matchs::whereDate('match_date', '>=', Carbon::today())
            ->where('is_premium', 1)
            ->whereNotNull('prediction')
            ->orderBy('match_date', 'asc')
            ->get();

        return response()->json([
            'data' => MatchResource::collection($matches)
        ]);
    }

    public function show(Request $request, $id, \App\Services\ApiFootballService $apiService)
    {
        $match = Matchs::findOrFail($id);

        // Eğer H2H veya Standings verisi boşsa ve gerekli ID'ler varsa API'den doldur ve kaydet
        if ((!$match->h2h_data || !$match->standings_data) && $match->home_team_id && $match->away_team_id) {

            if (!$match->h2h_data) {
                $h2h = $apiService->getHeadToHead($match->home_team_id, $match->away_team_id);
                $match->h2h_data = $h2h;
            }

            if (!$match->standings_data && $match->league_id && $match->season) {
                $standings = $apiService->getStandingsForTeams(
                    $match->league_id,
                    $match->season,
                    $match->home_team_id,
                    $match->away_team_id
                );
                $match->standings_data = $standings;
            }

            $match->save();
        }

        return new MatchResource($match);
    }
}
