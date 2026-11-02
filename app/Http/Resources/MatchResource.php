<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $user = $request->user();
        $isUserPremium = $user?->is_premium ?? false;
        $isLocked = (bool) $this->is_premium && !$isUserPremium;

        $statusMap = [
            'NS'   => 'Başlamadı',
            '1H'   => '1. Yarı',
            'HT'   => 'Devre Arası',
            '2H'   => '2. Yarı',
            'ET'   => 'Uzatmalarda',
            'P'    => 'Penaltılar',
            'FT'   => 'Bitti',
            'AET'  => 'Bitti (Uzatma)',
            'PEN'  => 'Bitti (Penaltı)',
            'INT'  => 'Yarıda Kesildi',
            'PST'  => 'Ertelendi',
            'CANC' => 'İptal Edildi',
            'SUSP' => 'Askıya Alındı',
        ];

        return [
            'id' => $this->id,
            'fixture_id' => $this->fixture_id,
            'league' => [
                'id' => $this->league_id,
                'name' => $this->league_name,
                'logo' => $this->league_logo,
                'round' => $this->round,
            ],
            'home_team' => [
                'id' => $this->home_team_id,
                'name' => $this->home_team,
                'logo' => $this->home_logo,
                'score' => $this->home_score,
                'form' => $this->home_form ?? 'N/A',
            ],
            'away_team' => [
                'id' => $this->away_team_id,
                'name' => $this->away_team,
                'logo' => $this->away_logo,
                'score' => $this->away_score,
                'form' => $this->away_form ?? 'N/A',
            ],
            'halftime_score' => $this->halftime_score,
            'match_date' => $this->match_date ? $this->match_date->format('Y-m-d H:i:s') : null,
            'match_status' => $this->match_status,
            'status_text'  => $statusMap[$this->match_status] ?? $this->match_status, // Türkçe metin: "Başlamadı"
            'prediction_status' => $this->prediction_status,
            'is_favorite' => method_exists($this->resource, 'isFavoriteForUser')
                ? $this->isFavoriteForUser($user?->id)
                : false,
            'is_premium' => (bool) $this->is_premium,
            'is_locked' => $isLocked,

            // Tahmin Verileri (VIP korumalı)
            'prediction' => $isLocked ? 'VIP TAHMİN' : $this->prediction,
            'odds' => $isLocked ? null : $this->odds,
            'confidence' => $this->confidence ?? 85,
            'analysis' => $isLocked
                ? 'Bu maça ait detaylı analiz ve istatistikler VIP üyelere özeldir.'
                : $this->analysis,

            // Ağır Detay İstatistikleri (Sadece veritabanında varsa döner)
            'h2h' => (!empty($this->h2h_data) && is_array($this->h2h_data) && !empty($this->h2h_data['matches']))
                ? $this->h2h_data
                : null,
            'standings' => (!empty($this->standings_data) && is_array($this->standings_data) && (!empty($this->standings_data['home']) || !empty($this->standings_data['full_table'])))
                ? $this->standings_data
                : null,
            'statistics' => (!empty($this->match_stats) && is_array($this->match_stats)) ? $this->match_stats : null,
            'lineups' => (!empty($this->lineups) && is_array($this->lineups)) ? $this->lineups : null,
        ];
    }
}
