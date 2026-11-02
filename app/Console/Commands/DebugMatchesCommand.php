<?php

namespace App\Console\Commands;

use App\Models\Matchs;
use App\Services\ApiFootballService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DebugMatchesCommand extends Command
{
    protected $signature = 'debug:matches
                            {--test-api : API bağlantısını test et}
                            {--show-stats : Veritabanındaki istatistikleri göster}
                            {--check-dates : Tarih kontrolü yap}
                            {--match-id= : Belirli bir maçın detaylarını göster}';

    protected $description = 'Maç ve istatistik sorunlarını debug etmek için yardımcı komut';

    protected ApiFootballService $apiService;

    public function __construct(ApiFootballService $apiService)
    {
        parent::__construct();
        $this->apiService = $apiService;
    }

    public function handle(): int
    {
        $this->info('🔍 Debug Modu Başlatılıyor...');
        $this->newLine();

        if ($this->option('test-api')) {
            $this->testApiConnection();
        }

        if ($this->option('show-stats')) {
            $this->showDatabaseStatistics();
        }

        if ($this->option('check-dates')) {
            $this->checkDates();
        }

        $matchId = $this->option('match-id');
        if ($matchId) {
            $this->showMatchDetails($matchId);
        }

        if (!$this->option('test-api') && !$this->option('show-stats') && !$this->option('check-dates') && !$matchId) {
            $this->info('Kullanım:');
            $this->line('  php artisan debug:matches --test-api          # API bağlantısını test et');
            $this->line('  php artisan debug:matches --show-stats        # Veritabanı istatistiklerini göster');
            $this->line('  php artisan debug:matches --check-dates       # Tarih kontrolü yap');
            $this->line('  php artisan debug:matches --match-id=123      # Maç detaylarını göster');
        }

        return Command::SUCCESS;
    }

    /**
     * API bağlantısını test et
     */
    protected function testApiConnection(): void
    {
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->info('🌐 API BAĞLANTI TESTİ');
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->newLine();

        // 1. API Status kontrolü
        $this->info('1️⃣  API Status kontrolü...');
        $status = $this->apiService->checkApiStatus();

        if ($status) {
            $this->info('   ✅ API bağlantısı başarılı');
            $this->line('   Hesap: ' . ($status['account']['firstname'] ?? 'N/A'));
            $this->line('   Plan: ' . ($status['subscription']['plan'] ?? 'N/A'));
            $this->line('   Günlük Limit: ' . ($status['requests']['limit_day'] ?? 'N/A'));
            $this->line('   Kullanılan: ' . ($status['requests']['current'] ?? 'N/A'));
        } else {
            $this->error('   ❌ API bağlantısı başarısız');
        }
        $this->newLine();

        // 2. Bugünün maçlarını çek
        $this->info('2️⃣  Bugünün maçlarını çekme testi...');
        $today = Carbon::today('Europe/Istanbul')->format('Y-m-d');
        $fixtures = $this->apiService->getFixturesByDate($today);

        if (!empty($fixtures)) {
            $this->info("   ✅ {$today} tarihinde " . count($fixtures) . " maç bulundu");

            // İlk maçı göster
            if (isset($fixtures[0])) {
                $first = $fixtures[0];
                $this->line('   Örnek maç: ' . ($first['teams']['home']['name'] ?? 'N/A') . ' vs ' . ($first['teams']['away']['name'] ?? 'N/A'));
                $this->line('   Lig: ' . ($first['league']['name'] ?? 'N/A'));
            }
        } else {
            $this->warn("   ⚠️  {$today} tarihinde maç bulunamadı");
        }
        $this->newLine();

        // 3. Yarının maçlarını çek
        $this->info('3️⃣  Yarının maçlarını çekme testi...');
        $tomorrow = Carbon::tomorrow('Europe/Istanbul')->format('Y-m-d');
        $fixtures = $this->apiService->getFixturesByDate($tomorrow);

        if (!empty($fixtures)) {
            $this->info("   ✅ {$tomorrow} tarihinde " . count($fixtures) . " maç bulundu");
        } else {
            $this->warn("   ⚠️  {$tomorrow} tarihinde maç bulunamadı");
        }
        $this->newLine();

        // 4. Öbür günün maçlarını çek
        $this->info('4️⃣  Öbür günün maçlarını çekme testi...');
        $dayAfterTomorrow = Carbon::today('Europe/Istanbul')->addDays(2)->format('Y-m-d');
        $fixtures = $this->apiService->getFixturesByDate($dayAfterTomorrow);

        if (!empty($fixtures)) {
            $this->info("   ✅ {$dayAfterTomorrow} tarihinde " . count($fixtures) . " maç bulundu");
        } else {
            $this->warn("   ⚠️  {$dayAfterTomorrow} tarihinde maç bulunamadı");
        }
        $this->newLine();

        // 5. Takım istatistikleri testi
        $this->info('5️⃣  Takım istatistikleri çekme testi...');
        $testTeamId = 645; // Galatasaray
        $testLeagueId = 203; // Süper Lig

        $stats = $this->apiService->getTeamStatistics($testTeamId, $testLeagueId);

        if ($stats) {
            $this->info('   ✅ Takım istatistikleri başarıyla çekildi');
            $this->line('   Takım: ' . ($stats['team']['name'] ?? 'N/A'));
            $this->line('   Oynanan: ' . ($stats['fixtures']['played']['total'] ?? 0));
            $this->line('   Galibiyet: ' . ($stats['fixtures']['wins']['total'] ?? 0));
        } else {
            $this->warn('   ⚠️  Takım istatistikleri çekilemedi');
        }
        $this->newLine();
    }

    /**
     * Veritabanı istatistiklerini göster
     */
    protected function showDatabaseStatistics(): void
    {
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->info('📊 VERİTABANI İSTATİSTİKLERİ');
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->newLine();

        $totalMatches = Matchs::count();
        $withStats = Matchs::whereNotNull('statistics_updated_at')->count();
        $withPrediction = Matchs::whereNotNull('prediction')->count();
        $todayMatches = Matchs::whereDate('match_date', Carbon::today('Europe/Istanbul'))->count();
        $tomorrowMatches = Matchs::whereDate('match_date', Carbon::tomorrow('Europe/Istanbul'))->count();
        $dayAfterMatches = Matchs::whereDate('match_date', Carbon::today('Europe/Istanbul')->addDays(2))->count();

        $this->table(
            ['Metrik', 'Değer'],
            [
                ['Toplam Maç', $totalMatches],
                ['İstatistikli Maç', $withStats],
                ['Tahminli Maç', $withPrediction],
                ['Bugünün Maçları', $todayMatches],
                ['Yarının Maçları', $tomorrowMatches],
                ['Öbür Günün Maçları', $dayAfterMatches],
            ]
        );

        $this->newLine();

        // Son eklenen 5 maçı göster
        $this->info('Son Eklenen 5 Maç:');
        $recentMatches = Matchs::orderBy('created_at', 'desc')->limit(5)->get();

        if ($recentMatches->isEmpty()) {
            $this->warn('Veritabanında maç yok');
        } else {
            $this->table(
                ['ID', 'Ev Sahibi', 'Deplasman', 'Tarih', 'İstatistik'],
                $recentMatches->map(function ($match) {
                    return [
                        $match->id,
                        $match->home_team,
                        $match->away_team,
                        $match->match_date->format('Y-m-d H:i'),
                        $match->statistics_updated_at ? '✅' : '❌'
                    ];
                })
            );
        }

        $this->newLine();
    }

    /**
     * Tarih kontrolü yap
     */
    protected function checkDates(): void
    {
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->info('📅 TARİH KONTROLÜ');
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->newLine();

        $now = Carbon::now('Europe/Istanbul');
        $today = Carbon::today('Europe/Istanbul');
        $tomorrow = Carbon::tomorrow('Europe/Istanbul');
        $dayAfter = $today->copy()->addDays(2);

        $this->table(
            ['Tarih', 'Değer', 'Format'],
            [
                ['Şu An', $now->toDateTimeString(), $now->format('Y-m-d H:i:s')],
                ['Bugün', $today->toDateString(), $today->format('Y-m-d')],
                ['Yarın', $tomorrow->toDateString(), $tomorrow->format('Y-m-d')],
                ['Öbür Gün', $dayAfter->toDateString(), $dayAfter->format('Y-m-d')],
            ]
        );

        $this->newLine();
        $this->info('Timezone: ' . config('app.timezone'));
        $this->info('PHP Timezone: ' . date_default_timezone_get());
        $this->newLine();
    }

    /**
     * Belirli bir maçın detaylarını göster
     */
    protected function showMatchDetails(int $matchId): void
    {
        $match = Matchs::find($matchId);

        if (!$match) {
            $this->error("❌ Maç bulunamadı (ID: {$matchId})");
            return;
        }

        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->info("📋 MAÇ DETAYLARI (ID: {$matchId})");
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->newLine();

        $this->table(
            ['Alan', 'Değer'],
            [
                ['Fixture ID', $match->fixture_id],
                ['Lig', $match->league_name],
                ['Ev Sahibi', $match->home_team . ' (ID: ' . $match->home_team_id . ')'],
                ['Deplasman', $match->away_team . ' (ID: ' . $match->away_team_id . ')'],
                ['Tarih', $match->match_date->format('Y-m-d H:i:s')],
                ['Durum', $match->match_status],
                ['Tahmin', $match->prediction ?? 'Yok'],
                ['Oran', $match->odds ?? 'Yok'],
                ['İstatistik Güncellenme', $match->statistics_updated_at ? $match->statistics_updated_at->format('Y-m-d H:i:s') : 'Hiç güncellenmedi'],
            ]
        );

        $this->newLine();

        if ($match->statistics_updated_at) {
            $this->info('Takım İstatistikleri:');
            $this->table(
                ['Takım', 'Oynanan', 'G', 'B', 'M', 'AG', 'YG', 'Form'],
                [
                    [
                        $match->home_team,
                        $match->home_played ?? 0,
                        $match->home_wins ?? 0,
                        $match->home_draws ?? 0,
                        $match->home_losses ?? 0,
                        $match->home_goals_for ?? 0,
                        $match->home_goals_against ?? 0,
                        $match->home_last_5_form ?? 'N/A'
                    ],
                    [
                        $match->away_team,
                        $match->away_played ?? 0,
                        $match->away_wins ?? 0,
                        $match->away_draws ?? 0,
                        $match->away_losses ?? 0,
                        $match->away_goals_for ?? 0,
                        $match->away_goals_against ?? 0,
                        $match->away_last_5_form ?? 'N/A'
                    ]
                ]
            );
        } else {
            $this->warn('⚠️  Bu maçın istatistikleri henüz çekilmemiş');
        }

        $this->newLine();
    }
}
