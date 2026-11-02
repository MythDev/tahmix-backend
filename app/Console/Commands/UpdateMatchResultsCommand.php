<?php

namespace App\Console\Commands;

use App\Models\Matchs;
use App\Services\ApiFootballService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateMatchResultsCommand extends Command
{
    /**
     * Komut imzası
     */
    protected $signature = 'update:match-results
                            {--days=1 : Kaç günlük maç sonuçları güncellenecek}';

    /**
     * Komut açıklaması
     */
    protected $description = 'Biten maçların skorlarını günceller ve admin tarafından girilen tahminlerin sonuçlarını kontrol eder';

    protected ApiFootballService $apiService;

    public function __construct(ApiFootballService $apiService)
    {
        parent::__construct();
        $this->apiService = $apiService;
    }

    /**
     * Komutu çalıştır
     */
    public function handle(): int
    {
        $this->info('🔄 Maç sonuçları güncelleniyor...');
        $this->newLine();

        $days = (int) $this->option('days');
        $startDate = Carbon::today()->subDays($days);

        // Belirtilen tarih aralığındaki pending veya live maçları al
        // Sadece admin tarafından tahmin eklenmiş maçları kontrol et
        $matches = Matchs::where('match_date', '>=', $startDate)
            ->whereIn('match_status', ['NS', 'LIVE', '1H', '2H', 'HT', 'ET', 'P'])
            ->whereNotNull('prediction') // Sadece tahminli maçlar
            ->get();

        if ($matches->isEmpty()) {
            $this->info('✅ Güncellenecek maç bulunamadı');
            return Command::SUCCESS;
        }

        $this->info("📊 {$matches->count()} maç güncelleniyor...");
        $bar = $this->output->createProgressBar($matches->count());
        $bar->start();

        $updated = 0;
        $finished = 0;

        foreach ($matches as $match) {
            $fixture = $this->apiService->getFixtureById($match->fixture_id);

            if ($fixture) {
                $oldStatus = $match->match_status;

                $match->update([
                    'match_status' => $fixture['fixture']['status']['short'],
                    'home_score' => $fixture['goals']['home'],
                    'away_score' => $fixture['goals']['away'],
                ]);

                $updated++;

                // Maç bittiyse tahmin durumunu güncelle
                if ($fixture['fixture']['status']['short'] === 'FT' && $oldStatus !== 'FT') {
                    $this->updatePredictionStatus($match);
                    $finished++;
                }
            }

            $bar->advance();
            sleep(1); // Rate limiting
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("✅ {$updated} maç güncellendi");
        $this->info("🏁 {$finished} maç tamamlandı ve tahmin sonuçları kontrol edildi");

        return Command::SUCCESS;
    }

    /**
     * Admin tarafından girilen tahminin doğru olup olmadığını kontrol et
     */
    protected function updatePredictionStatus(Matchs $match): void
    {
        if (!$match->prediction) {
            return;
        }

        $homeScore = $match->home_score ?? 0;
        $awayScore = $match->away_score ?? 0;

        // Gerçek sonucu belirle
        $actualResult = null;
        if ($homeScore > $awayScore) {
            $actualResult = '1'; // Ev sahibi kazandı
        } elseif ($homeScore < $awayScore) {
            $actualResult = '2'; // Deplasman kazandı
        } else {
            $actualResult = 'X'; // Beraberlik
        }

        // Admin'in tahminini kontrol et
        $predictionStatus = ($match->prediction === $actualResult) ? 'won' : 'lost';

        $match->update(['prediction_status' => $predictionStatus]);

        Log::info("Admin tahmini kontrol edildi", [
            'match_id' => $match->id,
            'home_team' => $match->home_team,
            'away_team' => $match->away_team,
            'score' => "{$homeScore}-{$awayScore}",
            'admin_prediction' => $match->prediction,
            'actual_result' => $actualResult,
            'status' => $predictionStatus
        ]);
    }
}
