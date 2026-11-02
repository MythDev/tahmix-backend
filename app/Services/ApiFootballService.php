<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ApiFootballService
{
    protected string $baseUrl;
    protected array $headers;

    public const LEAGUE_IDS = [
        203 => 'Türkiye Süper Lig',
        78  => 'Bundesliga (Almanya)',
        140 => 'La Liga (İspanya)',
        135 => 'Serie A (İtalya)',
        61  => 'Ligue 1 (Fransa)',
        88  => 'Eredivisie (Hollanda)',
        103 => 'Eliteserien (Norveç)',
        113 => 'Allsvenskan (İsveç)',
        119 => 'Superliga (Danimarka)',
        71  => 'Brasileirão Série A (Brezilya)',
        144 => 'Jupiler Pro League (Belçika)',
        218 => 'Bundesliga (Avusturya)',
        179 => 'Premiership (İskoçya)',
    ];

    public function __construct()
    {
        $this->baseUrl = config('services.api_football.url', env('API_FOOTBALL_URL', 'https://v3.football.api-sports.io'));
        $this->headers = [
            'x-apisports-key' => config('services.api_football.key', env('API_FOOTBALL_KEY')),
        ];
    }

    public function getFixturesByDate(string $date): array
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->timeout(30)
                ->get("{$this->baseUrl}/fixtures", [
                    'date' => $date,
                    'timezone' => 'Europe/Istanbul'
                ]);

            if ($response->successful()) {
                return $response->json()['response'] ?? [];
            }

            Log::error("API-Football getFixturesByDate Hatası", [
                'date' => $date,
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            return [];
        } catch (\Exception $e) {
            Log::error("API-Football Exception: " . $e->getMessage());
            return [];
        }
    }

    public function getFixtureById(int $fixtureId): ?array
    {
        $cacheKey = "fixture_{$fixtureId}";

        return Cache::remember($cacheKey, now()->addHours(2), function () use ($fixtureId) {
            try {
                $response = Http::withHeaders($this->headers)
                    ->timeout(30)
                    ->get("{$this->baseUrl}/fixtures", [
                        'id' => $fixtureId,
                        'timezone' => 'Europe/Istanbul'
                    ]);

                if ($response->successful()) {
                    return $response->json()['response'][0] ?? null;
                }
                return null;
            } catch (\Exception $e) {
                Log::error("API-Football getFixtureById Exception: " . $e->getMessage());
                return null;
            }
        });
    }

    /**
     * İki takım arasındaki son maçları (H2H) çeker. (7 gün önbelleğe alınır)
     */
    public function getHeadToHead(int $team1Id, int $team2Id, int $last = 5): array
    {
        $cacheKey = "h2h_{$team1Id}_{$team2Id}";

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            // 'last' parametresi ÜCRETSİZ planda yasak olduğu için GÖNDERMİYORUZ!
            $response = Http::withHeaders($this->headers)
                ->timeout(30)
                ->get("{$this->baseUrl}/fixtures/headtohead", [
                    'h2h' => "{$team1Id}-{$team2Id}",
                    'timezone' => 'Europe/Istanbul'
                ]);

            $json = $response->json();

            // API hatası varsa logla ve boş dön
            if (!empty($json['errors'])) {
                Log::error("API-Football H2H Hatası", $json['errors']);
                return [];
            }

            $allMatches = $json['response'] ?? [];
            if (empty($allMatches)) {
                return [];
            }

            // PHP tarafında son $last (5) maçı kesip alıyoruz
            $rawMatches = array_slice($allMatches, 0, $last);

            $h2hList = [];
            $over25Count = 0;
            $bttsCount = 0;

            foreach ($rawMatches as $m) {
                $hScore = $m['goals']['home'] ?? 0;
                $aScore = $m['goals']['away'] ?? 0;
                $totalGoals = $hScore + $aScore;

                if ($totalGoals > 2.5) $over25Count++;
                if ($hScore > 0 && $aScore > 0) $bttsCount++;

                $h2hList[] = [
                    'date' => substr($m['fixture']['date'], 0, 10),
                    'home_team' => $m['teams']['home']['name'],
                    'away_team' => $m['teams']['away']['name'],
                    'home_score' => $hScore,
                    'away_score' => $aScore,
                    'winner' => ($hScore > $aScore) ? 'home' : (($aScore > $hScore) ? 'away' : 'draw'),
                ];
            }

            $total = count($rawMatches);
            $result = [
                'matches' => $h2hList,
                'summary' => [
                    'total_matches' => $total,
                    'over_2_5_percentage' => $total > 0 ? round(($over25Count / $total) * 100) : 0,
                    'btts_percentage' => $total > 0 ? round(($bttsCount / $total) * 100) : 0,
                ]
            ];

            // Sadece veri doluysa 7 gün önbelleğe al
            Cache::put($cacheKey, $result, now()->addDays(7));
            return $result;

        } catch (\Exception $e) {
            Log::error("API-Football H2H Exception: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Lig puan durumunu çeker. İki takımın sıralamasını filtreler. (12 saat önbellek)
     */
    public function getStandingsForTeams(int $leagueId, int $season, int $homeTeamId, int $awayTeamId): array
    {
        $cacheKey = "standings_{$leagueId}_{$season}";

        $standingsTable = Cache::remember($cacheKey, now()->addHours(12), function () use ($leagueId, $season) {
            try {
                $response = Http::withHeaders($this->headers)
                    ->timeout(30)
                    ->get("{$this->baseUrl}/standings", [
                        'league' => $leagueId,
                        'season' => $season,
                    ]);

                if ($response->successful()) {
                    return $response->json()['response'][0]['league']['standings'][0] ?? [];
                }
                return [];
            } catch (\Exception $e) {
                Log::error("API-Football Standings Exception: " . $e->getMessage());
                return [];
            }
        });

        if (empty($standingsTable)) {
            return [];
        }

        $homeStanding = null;
        $awayStanding = null;

        foreach ($standingsTable as $row) {
            $teamId = $row['team']['id'];
            $data = [
                'rank' => $row['rank'],
                'team_name' => $row['team']['name'],
                'points' => $row['points'],
                'played' => $row['all']['played'],
                'win' => $row['all']['win'],
                'draw' => $row['all']['draw'],
                'lose' => $row['all']['lose'],
                'goals_diff' => $row['goalsDiff'],
                'form' => $row['form'] ?? '', // Örn: WWLDW
            ];

            if ($teamId == $homeTeamId) $homeStanding = $data;
            if ($teamId == $awayTeamId) $awayStanding = $data;
        }

        return [
            'home' => $homeStanding,
            'away' => $awayStanding,
            'full_table' => array_map(fn($r) => [
                'rank' => $r['rank'],
                'team_name' => $r['team']['name'],
                'team_logo' => $r['team']['logo'],
                'points' => $r['points'],
                'played' => $r['all']['played'],
                'goals_diff' => $r['goalsDiff'],
            ], array_slice($standingsTable, 0, 8)), // Mobilde şişkinlik yapmasın diye ilk 8 takım özeti
        ];
    }

    public function checkApiStatus(): ?array
    {
        try {
            $response = Http::withHeaders($this->headers)->get("{$this->baseUrl}/status");
            return $response->successful() ? ($response->json()['response'] ?? null) : null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
