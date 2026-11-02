<?php

namespace App\Console\Commands;

use App\Models\Matchs;
use App\Services\ApiFootballService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchMatchesCommand extends Command
{
    protected $signature = 'fetch:matches {date? : Tarih (YYYY-MM-DD)}';
    protected $description = 'API-Football\'dan bugün ve yarının maçlarını çeker ve tüm istatistik ID\'leriyle kaydeder';

    protected ApiFootballService $apiService;

    public function __construct(ApiFootballService $apiService)
    {
        parent::__construct();
        $this->apiService = $apiService;
    }

    public function handle(): int
    {
        $this->info('🚀 Maç çekme işlemi başlatılıyor...');
        $this->newLine();

        $dates = [
            'Bugün' => $this->argument('date') ?: Carbon::today('Europe/Istanbul')->format('Y-m-d'),
            'Yarın' => $this->argument('date')
                ? Carbon::parse($this->argument('date'))->addDay()->format('Y-m-d')
                : Carbon::tomorrow('Europe/Istanbul')->format('Y-m-d'),
        ];

        $this->info("📊 Takip edilen ligler: " . count(ApiFootballService::LEAGUE_IDS));
        $this->info("🌍 Timezone: Europe/Istanbul");
        $this->newLine();

        $totalNew = 0;
        $totalUpdated = 0;

        foreach ($dates as $label => $date) {
            $this->info("🔍 {$label} ({$date}) tarihi işleniyor...");

            $allFixtures = $this->apiService->getFixturesByDate($date);

            if (empty($allFixtures)) {
                $this->warn("   ⚠️  Maç bulunamadı");
                $this->newLine();
                continue;
            }

            $trackedLeagueIds = array_keys(ApiFootballService::LEAGUE_IDS);
            $filteredFixtures = array_filter($allFixtures, function($fixture) use ($trackedLeagueIds) {
                return in_array($fixture['league']['id'] ?? 0, $trackedLeagueIds);
            });

            $this->info("   ✅ Toplam " . count($allFixtures) . " maç bulundu");
            $this->info("   🎯 Takip edilen liglerden " . count($filteredFixtures) . " maç");

            if (empty($filteredFixtures)) {
                $this->warn("   ⚠️  Takip edilen liglerde maç yok");
                $this->newLine();
                continue;
            }

            $bar = $this->output->createProgressBar(count($filteredFixtures));
            $bar->start();

            foreach ($filteredFixtures as $fixture) {
                $result = $this->saveOrUpdateMatch($fixture);

                if ($result === 'new') {
                    $totalNew++;
                } elseif ($result === 'updated') {
                    $totalUpdated++;
                }

                $bar->advance();
            }

            $bar->finish();
            $this->newLine(2);
        }

        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->info('📊 İŞLEM ÖZETİ');
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->line("   Yeni Eklenen: {$totalNew}");
        $this->line("   Güncellenen: {$totalUpdated}");
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->newLine();
        $this->info('✅ İşlem başarıyla tamamlandı!');

        return Command::SUCCESS;
    }

    protected function saveOrUpdateMatch(array $fixture): string
    {
        try {
            $fixtureId = $fixture['fixture']['id'];
            $matchDate = Carbon::parse($fixture['fixture']['date'])->setTimezone('Europe/Istanbul');
            $matchStatus = $fixture['fixture']['status']['short'] ?? 'NS';

            // İlk yarı skoru formatlama (örn: 1-0)
            $halftimeHome = $fixture['score']['halftime']['home'] ?? null;
            $halftimeAway = $fixture['score']['halftime']['away'] ?? null;
            $halftimeScore = ($halftimeHome !== null && $halftimeAway !== null)
                ? "{$halftimeHome}-{$halftimeAway}"
                : null;

            // GÜVENLİK KORUMASI: Maç henüz başlamadıysa skorları zorla NULL yap
            $isNotStarted = in_array($matchStatus, ['NS', 'PST', 'CANC', 'TBD']);
            $homeScore = $isNotStarted ? null : ($fixture['goals']['home'] ?? null);
            $awayScore = $isNotStarted ? null : ($fixture['goals']['away'] ?? null);
            $halftime = $isNotStarted ? null : $halftimeScore;

            $matchData = [
                'fixture_id'     => $fixtureId,
                'league_id'      => $fixture['league']['id'] ?? null,
                'season'         => $fixture['league']['season'] ?? null,
                'round'          => $fixture['league']['round'] ?? null,
                'league_name'    => $fixture['league']['name'],
                'league_logo'    => $fixture['league']['logo'],
                'home_team_id'   => $fixture['teams']['home']['id'] ?? null,
                'home_team'      => $fixture['teams']['home']['name'],
                'home_logo'      => $fixture['teams']['home']['logo'],
                'away_team_id'   => $fixture['teams']['away']['id'] ?? null,
                'away_team'      => $fixture['teams']['away']['name'],
                'away_logo'      => $fixture['teams']['away']['logo'],
                'match_date'     => $matchDate,
                'match_status'   => $matchStatus,
                'home_score'     => $homeScore,
                'away_score'     => $awayScore,
                'halftime_score' => $halftime,
            ];

            $existingMatch = Matchs::where('fixture_id', $fixtureId)->first();

            if ($existingMatch) {
                // Önceden kayıtlı maçların tüm yeni ID ve skor alanlarını güncelliyoruz
                $existingMatch->update([
                    'league_id'      => $matchData['league_id'],
                    'season'         => $matchData['season'],
                    'round'          => $matchData['round'],
                    'league_name'    => $matchData['league_name'],
                    'league_logo'    => $matchData['league_logo'],
                    'home_team_id'   => $matchData['home_team_id'],
                    'home_team'      => $matchData['home_team'],
                    'home_logo'      => $matchData['home_logo'],
                    'away_team_id'   => $matchData['away_team_id'],
                    'away_team'      => $matchData['away_team'],
                    'away_logo'      => $matchData['away_logo'],
                    'match_status'   => $matchData['match_status'],
                    'match_date'     => $matchData['match_date'],
                    'home_score'     => $matchData['home_score'],
                    'away_score'     => $matchData['away_score'],
                    'halftime_score' => $matchData['halftime_score'],
                ]);
                return 'updated';
            }

            Matchs::create(array_merge($matchData, [
                'prediction'        => null,
                'odds'              => null,
                'analysis'          => null,
                'confidence'        => 80,
                'home_form'         => null,
                'away_form'         => null,
                'is_premium'        => false,
                'prediction_status' => 'pending',
                'h2h_data'          => null,
                'standings_data'    => null,
                'match_stats'       => null,
                'lineups'           => null,
            ]));

            return 'new';

        } catch (\Exception $e) {
            Log::error('Maç kaydedilemedi', [
                'fixture_id' => $fixture['fixture']['id'] ?? 'unknown',
                'error' => $e->getMessage()
            ]);
            return 'error';
        }
    }
}
