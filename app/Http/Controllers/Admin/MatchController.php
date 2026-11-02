<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matchs;
use App\Services\ApiFootballService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MatchController extends Controller
{
    protected ApiFootballService $apiService;

    public function __construct(ApiFootballService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function index()
    {
        $matches = Matchs::orderBy('match_date', 'desc')->paginate(25);
        return view('admin.matches.index', compact('matches'));
    }

    public function edit(Matchs $match)
    {
        return view('admin.matches.edit', compact('match'));
    }

    public function update(Request $request, Matchs $match)
    {
        $validated = $request->validate([
            'prediction'        => 'nullable|string|max:255',
            'odds'              => 'nullable|numeric',
            'is_premium'        => 'required|boolean',
            'prediction_status' => 'required|in:pending,won,lost,void',
            'confidence'        => 'nullable|integer|min:0|max:100',
            'analysis'          => 'nullable|string',
            'home_form'         => 'nullable|string|max:50',
            'away_form'         => 'nullable|string|max:50',
        ]);

        $match->update($validated);

        if (!empty($match->prediction) && $match->home_team_id && $match->away_team_id) {
            $updated = false;

            try {
                if (empty($match->h2h_data)) {
                    $h2h = $this->apiService->getHeadToHead($match->home_team_id, $match->away_team_id);
                    if (!empty($h2h)) {
                        $match->h2h_data = $h2h;
                        $updated = true;
                    }
                }

                if (empty($match->standings_data) && $match->league_id && $match->season) {
                    $standings = $this->apiService->getStandingsForTeams(
                        $match->league_id,
                        $match->season,
                        $match->home_team_id,
                        $match->away_team_id
                    );
                    if (!empty($standings)) {
                        $match->standings_data = $standings;

                        if (empty($match->home_form) && !empty($standings['home']['form'])) {
                            $match->home_form = $standings['home']['form'];
                        }
                        if (empty($match->away_form) && !empty($standings['away']['form'])) {
                            $match->away_form = $standings['away']['form'];
                        }

                        $updated = true;
                    }
                }
                if ($updated) {
                    $match->save();
                }
            } catch (\Exception $e) {
                Log::error("Admin Maç İstatistik Çekme Hatası (Match ID: {$match->id}): " . $e->getMessage());
            }
        }
        return redirect()
            ->route('admin.matches.index')
            ->with('success', 'Maç tahmini kaydedildi' . (!empty($match->h2h_data) ? ' ve analiz verileri hazırlandı!' : '!'));
    }
}
