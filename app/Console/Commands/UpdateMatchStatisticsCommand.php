<?php

namespace App\Console\Commands;

use App\Models\Matchs;
use App\Services\ApiFootballService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateMatchStatisticsCommand extends Command
{
    protected $signature = 'update:match-statistics
                            {--match-id= : Belirli bir maçın istatistiklerini güncelle}
                            {--days=7 : Kaç günlük maçların istatistiklerini güncelleyecek}
                            {--force : Cache\'i yoksay ve yeniden çek}';

    protected $description = 'Maçların takım istatistiklerini günceller';

    protected ApiFootballService $apiService;

    public function __construct(ApiFootballService $apiService)
    {
        parent::__construct();
        $this->apiService = $apiService;
    }

    public function handle(): int
    {
        $this->info('📊 Takım istatistikleri güncelleniyor...');
        $this->newLine();

        $matchId = $this->option('match-id');
        $days = max(1, (int) $this->option('days'));
        $force = $this->option('force');

        if ($force) {
            $this->warn('⚠️  Cache yoksayılıyor (--force)');
            $this->apiService->clearCache();
        }

        if ($matchId) {
            return $this->updateSingleMatch($matchId);
        }

        return $this->updateMultipleMatches($days);
    }

    /**
     * Tek bir maçın istatistiklerini güncelle
     */
    protected function updateSingleMatch(int $matchId): int
    {
        $match = Matchs::find($matchId);

        if (!$match) {
            $this->error("❌ Maç bulunamadı (ID: {$matchId})");
            return Command::FAILURE;
        }

        if (!$match->home_team_id || !$match->away_team_id || !$match->league_id) {
            $this->error("❌ Maç bilgileri eksik (team_id veya league_id yok)");
            return Command::FAILURE;
        }

        $this->info("🎯 Maç: {$match->home_team} vs {$match->away_team}");
        $this->info("📅 Tarih: {$match->match_date->format('Y-m-d H:i')}");
        $this->newLine();

        try {
            $success = $this->updateMatchStatistics($match);

            if ($success) {
                $this->info('✅ İstatistikler başarıyla güncellendi!');
                $this->displayMatchStatistics($match->fresh());
                return Command::SUCCESS;
            } else {
                $this->warn('⚠️  İstatistikler güncellenemedi (API\'den veri gelmedi)');
                return Command::FAILURE;
            }

        } catch (\Exception $e) {
            $this->error("❌ Hata: " . $e->getMessage());
            Log::error('UpdateMatchStatisticsCommand single match error', [
                'match_id' => $matchId,
                'error' => $e->getMessage()
            ]);
            return Command::FAILURE;
        }
    }

    /**
     * Birden fazla maçın istatistiklerini güncelle
     */
    protected function updateMultipleMatches(int $days): int
    {
        $startDate = Carbon::now('Europe/Istanbul')->subDays(1)->startOfDay();
        $endDate = Carbon::now('Europe/Istanbul')->addDays($days)->endOfDay();

        $matches = Matchs::whereBetween('match_date', [$startDate, $endDate])
            ->whereNotNull('home_team_id')
            ->whereNotNull('away_team_id')
            ->whereNotNull('league_id')
            ->orderBy('match_date', 'asc')
            ->get();

        if ($matches->isEmpty()) {
            $this->warn('⚠️  Güncellenecek maç bulunamadı');
            $this->info("📅 Tarih aralığı: {$startDate->format('Y-m-d')} - {$endDate->format('Y-m-d')}");
            return Command::SUCCESS;
        }

        $this->info("📅 Tarih aralığı: {$startDate->format('Y-m-d')} - {$endDate->format('Y-m-d')}");
        $this->info("📊 Toplam {$matches->count()} maç güncellenecek");
        $this->newLine();

        $bar = $this->output->createProgressBar($matches->count());
        $bar->start();

        $updated = 0;
        $failed = 0;
        $skipped = 0;

        foreach ($matches as $match) {
            try {
                $success = $this->updateMatchStatistics($match);

                if ($success) {
                    $updated++;
                } else {
                    $skipped++;
                }

                // API rate limit için kısa bekleme (100ms)
                usleep(100000);

            } catch (\Exception $e) {
                $failed++;
                Log::error('İstatistik güncellenemedi', [
                    'match_id' => $match->id,
                    'home_team' => $match->home_team,
                    'away_team' => $match->away_team,
                    'error' => $e->getMessage()
                ]);
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        // Özet
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->info('📊 İŞLEM ÖZETİ');
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->line("   Güncellenen: {$updated}");
        $this->line("   Atlanan: {$skipped}");
        $this->line("   Başarısız: {$failed}");
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->newLine();
        $this->info('✅ İşlem tamamlandı!');

        return Command::SUCCESS;
    }

    /**
     * Tek bir maçın istatistiklerini günceller
     */
    protected function updateMatchStatistics(Matchs $match): bool
    {
        $updateData = [];
        $hasUpdate = false;

        // Ev sahibi takım istatistikleri
        $homeStats = $this->apiService->getTeamStatistics(
            $match->home_team_id,
            $match->league_id
        );

        if ($homeStats) {
            $fixtures = $homeStats['fixtures'] ?? [];
            $goals = $homeStats['goals'] ?? [];

            $updateData['home_played'] = $fixtures['played']['total'] ?? 0;
            $updateData['home_wins'] = $fixtures['wins']['total'] ?? 0;
            $updateData['home_draws'] = $fixtures['draws']['total'] ?? 0;
            $updateData['home_losses'] = $fixtures['loses']['total'] ?? 0;
            $updateData['home_goals_for'] = $goals['for']['total']['total'] ?? 0;
            $updateData['home_goals_against'] = $goals['against']['total']['total'] ?? 0;

            $hasUpdate = true;
        }

        // Deplasman takım istatistikleri
        $awayStats = $this->apiService->getTeamStatistics(
            $match->away_team_id,
            $match->league_id
        );

        if ($awayStats) {
            $fixtures = $awayStats['fixtures'] ?? [];
            $goals = $awayStats['goals'] ?? [];

            $updateData['away_played'] = $fixtures['played']['total'] ?? 0;
            $updateData['away_wins'] = $fixtures['wins']['total'] ?? 0;
            $updateData['away_draws'] = $fixtures['draws']['total'] ?? 0;
            $updateData['away_losses'] = $fixtures['loses']['total'] ?? 0;
            $updateData['away_goals_for'] = $goals['for']['total']['total'] ?? 0;
            $updateData['away_goals_against'] = $goals['against']['total']['total'] ?? 0;

            $hasUpdate = true;
        }

        // Son 5 maç formu
        $homeLastMatches = $this->apiService->getTeamLastMatches($match->home_team_id, 5);
        $awayLastMatches = $this->apiService->getTeamLastMatches($match->away_team_id, 5);

        $homeForm = $this->apiService->buildFormString($homeLastMatches, $match->home_team_id);
        $awayForm = $this->apiService->buildFormString($awayLastMatches, $match->away_team_id);

        if (!empty($homeForm)) {
            $updateData['home_last_5_form'] = $homeForm;
            $updateData['home_form'] = $homeForm;
            $hasUpdate = true;
        }

        if (!empty($awayForm)) {
            $updateData['away_last_5_form'] = $awayForm;
            $updateData['away_form'] = $awayForm;
            $hasUpdate = true;
        }

        // Güncelleme varsa kaydet
        if ($hasUpdate) {
            $updateData['statistics_updated_at'] = now();
            $match->update($updateData);
            return true;
        }

        return false;
    }

    /**
     * Maç istatistiklerini ekrana yazdır
     */
    protected function displayMatchStatistics(Matchs $match): void
    {
        $this->newLine();
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->info("📊 {$match->home_team} vs {$match->away_team}");
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');

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

        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
    }
}
