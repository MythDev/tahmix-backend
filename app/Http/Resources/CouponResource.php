<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $user = $request->user();
        $isUserPremium = $user ? (bool) $user->is_premium : false;

        // Kupon VIP ise ve kullanıcı abone değilse kilitlidir
        $isLocked = $this->is_premium && !$isUserPremium;

        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'is_premium'  => (bool) $this->is_premium,
            'is_locked'   => $isLocked,
            'total_odds'  => (float) $this->total_odds,
            'status'      => $this->status, // pending, won, lost, void
            'confidence'  => (int) $this->confidence,
            'note'        => $this->note,
            'created_at'  => $this->created_at->toIso8601String(),
            'matches'     => $this->couponMatches->map(function ($item) use ($isLocked) {
                $match = $item->match;
                return [
                    'id'               => $item->id,
                    'match_id'         => $item->match_id,
                    'home_team'        => $match ? $match->home_team : 'Ev Sahibi',
                    'away_team'        => $match ? $match->away_team : 'Deplasman',
                    'home_logo'        => $match ? $match->home_logo : null,
                    'away_logo'        => $match ? $match->away_logo : null,
                    'league_name'      => $match ? $match->league_name : 'Futbol Ligi',
                    'league_logo'      => $match ? $match->league_logo : null,
                    'match_date'       => $match && $match->match_date ? $match->match_date->toIso8601String() : null,
                    'home_score'       => $match ? $match->home_score : null,
                    'away_score'       => $match ? $match->away_score : null,
                    // Güvenlik: Kilitliyse gerçek veri API cevabında bile gitmez
                    'prediction'       => $isLocked ? '••••••' : $item->prediction,
                    'odds'             => $isLocked ? 0.00 : (float) $item->odds,
                    'status'           => $item->status, // pending, won, lost, void
                ];
            }),
        ];
    }
}
