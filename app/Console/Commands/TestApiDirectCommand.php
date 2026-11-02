<?php

namespace App\Console\Commands;

use App\Services\ApiFootballService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestApiDirectCommand extends Command
{
    protected $signature = 'test:api-direct';
    protected $description = 'API\'yi direkt test et ve sonuçları göster';

    public function handle(): int
    {
        $this->info('🔍 API Direkt Test Başlatılıyor...');
        $this->newLine();

        // API Key kontrolü
        $apiKey = env('API_FOOTBALL_KEY');
        if (empty($apiKey)) {
            $this->error('❌ API_FOOTBALL_KEY .env dosyasında tanımlı değil!');
            return Command::FAILURE;
        }

        $this->info("✅ API Key bulundu: " . substr($apiKey, 0, 10) . "...");
        $this->newLine();

        // Timezone kontrolü
        $this->info('📅 Timezone Bilgileri:');
        $this->line('   Config Timezone: ' . config('app.timezone'));
        $this->line('   PHP Timezone: ' . date_default_timezone_get());
        $this->line('   Carbon Now: ' . Carbon::now()->toDateTimeString());
        $this->line('   Carbon Now (Istanbul): ' . Carbon::now('Europe/Istanbul')->toDateTimeString());
        $this->newLine();

        // Test tarihleri
        $dates = [
            'Bugün (22 Nisan)' => '2026-04-22',
            'Yarın (23 Nisan)' => '2026-04-23',
            'Öbür Gün (24 Nisan)' => '2026-04-24',
        ];

        foreach ($dates as $label => $date) {
            $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");
            $this->info("🔍 {$label} - {$date}");
            $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");

            try {
                $response = Http::withHeaders([
                    'x-apisports-key' => $apiKey,
                ])
                    ->timeout(30)
                    ->get('https://v3.football.api-sports.io/fixtures', [
                        'date' => $date,
                        'timezone' => 'Europe/Istanbul'
                    ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $fixtures = $data['response'] ?? [];

                    $this->info("✅ API Response Başarılı");
                    $this->line("   Toplam Maç: " . count($fixtures));

                    // API bilgileri
                    if (isset($data['parameters'])) {
                        $this->line("   API Parameters:");
                        $this->line("      Date: " . ($data['parameters']['date'] ?? 'N/A'));
                        $this->line("      Timezone: " . ($data['parameters']['timezone'] ?? 'N/A'));
                    }

                    if (isset($data['results'])) {
                        $this->line("   API Results: " . $data['results']);
                    }

                    // Takip edilen liglerdeki maçları filtrele
                    $trackedLeagues = ApiFootballService::LEAGUE_IDS;
                    $trackedLeagueIds = array_keys($trackedLeagues);

                    $filteredFixtures = array_filter($fixtures, function($fixture) use ($trackedLeagueIds) {
                        return in_array($fixture['league']['id'] ?? 0, $trackedLeagueIds);
                    });

                    $this->line("   Takip Edilen Liglerde: " . count($filteredFixtures) . " maç");

                    // İlk 5 maçı göster
                    if (!empty($filteredFixtures)) {
                        $this->newLine();
                        $this->info("   📋 İlk 5 Maç:");

                        $count = 0;
                        foreach ($filteredFixtures as $fixture) {
                            if ($count >= 5) break;

                            $leagueName = $fixture['league']['name'] ?? 'N/A';
                            $homeTeam = $fixture['teams']['home']['name'] ?? 'N/A';
                            $awayTeam = $fixture['teams']['away']['name'] ?? 'N/A';
                            $matchDate = $fixture['fixture']['date'] ?? 'N/A';

                            $this->line("      {$leagueName}: {$homeTeam} vs {$awayTeam} ({$matchDate})");
                            $count++;
                        }
                    } else {
                        $this->warn("   ⚠️  Takip edilen liglerde maç yok!");

                        // Tüm ligleri göster
                        if (!empty($fixtures)) {
                            $this->newLine();
                            $this->info("   📋 Tüm Ligler (ilk 10):");
                            $leagues = [];
                            foreach (array_slice($fixtures, 0, 10) as $fixture) {
                                $leagueId = $fixture['league']['id'] ?? 0;
                                $leagueName = $fixture['league']['name'] ?? 'N/A';
                                if (!isset($leagues[$leagueId])) {
                                    $leagues[$leagueId] = $leagueName;
                                    $this->line("      ID: {$leagueId} - {$leagueName}");
                                }
                            }
                        }
                    }

                } else {
                    $this->error("❌ API Hatası");
                    $this->line("   Status Code: " . $response->status());
                    $this->line("   Response: " . $response->body());
                }

            } catch (\Exception $e) {
                $this->error("❌ Exception: " . $e->getMessage());
            }

            $this->newLine();
        }

        // Takım istatistikleri testi
        $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");
        $this->info("🔍 Takım İstatistikleri Testi");
        $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");

        // Galatasaray - Süper Lig
        $testTeamId = 645;
        $testLeagueId = 203;
        $testSeason = 2025; // Nisan 2026 için 2025-2026 sezonu

        $this->info("Test Takım: Galatasaray (ID: {$testTeamId})");
        $this->info("Test Lig: Süper Lig (ID: {$testLeagueId})");
        $this->info("Test Sezon: {$testSeason}");
        $this->newLine();

        try {
            $response = Http::withHeaders([
                'x-apisports-key' => $apiKey,
            ])
                ->timeout(30)
                ->get('https://v3.football.api-sports.io/teams/statistics', [
                    'team' => $testTeamId,
                    'league' => $testLeagueId,
                    'season' => $testSeason,
                ]);

            if ($response->successful()) {
                $data = $response->json();
                $stats = $data['response'] ?? null;

                if ($stats) {
                    $this->info("✅ İstatistikler Başarıyla Çekildi");
                    $this->newLine();

                    $this->table(
                        ['Alan', 'Değer'],
                        [
                            ['Takım', $stats['team']['name'] ?? 'N/A'],
                            ['Lig', $stats['league']['name'] ?? 'N/A'],
                            ['Sezon', $stats['league']['season'] ?? 'N/A'],
                            ['Oynanan', $stats['fixtures']['played']['total'] ?? 0],
                            ['Galibiyet', $stats['fixtures']['wins']['total'] ?? 0],
                            ['Beraberlik', $stats['fixtures']['draws']['total'] ?? 0],
                            ['Mağlubiyet', $stats['fixtures']['loses']['total'] ?? 0],
                            ['Atılan Gol', $stats['goals']['for']['total']['total'] ?? 0],
                            ['Yenilen Gol', $stats['goals']['against']['total']['total'] ?? 0],
                        ]
                    );
                } else {
                    $this->warn("⚠️  İstatistik verisi boş");
                    $this->line("Response: " . json_encode($data, JSON_PRETTY_PRINT));
                }

            } else {
                $this->error("❌ API Hatası");
                $this->line("   Status Code: " . $response->status());
                $this->line("   Response: " . $response->body());
            }

        } catch (\Exception $e) {
            $this->error("❌ Exception: " . $e->getMessage());
        }

        $this->newLine();

        // Son 5 maç testi
        $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");
        $this->info("🔍 Son 5 Maç Testi");
        $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");

        try {
            $response = Http::withHeaders([
                'x-apisports-key' => $apiKey,
            ])
                ->timeout(30)
                ->get('https://v3.football.api-sports.io/fixtures', [
                    'team' => $testTeamId,
                    'last' => 5,
                    'timezone' => 'Europe/Istanbul'
                ]);

            if ($response->successful()) {
                $data = $response->json();
                $matches = $data['response'] ?? [];

                $this->info("✅ Son Maçlar Başarıyla Çekildi");
                $this->line("   Toplam: " . count($matches) . " maç");
                $this->newLine();

                if (!empty($matches)) {
                    foreach ($matches as $match) {
                        $homeTeam = $match['teams']['home']['name'] ?? 'N/A';
                        $awayTeam = $match['teams']['away']['name'] ?? 'N/A';
                        $homeGoals = $match['goals']['home'] ?? '-';
                        $awayGoals = $match['goals']['away'] ?? '-';
                        $status = $match['fixture']['status']['short'] ?? 'N/A';
                        $date = $match['fixture']['date'] ?? 'N/A';

                        $this->line("   {$homeTeam} {$homeGoals} - {$awayGoals} {$awayTeam} ({$status}) - {$date}");
                    }
                }

            } else {
                $this->error("❌ API Hatası");
                $this->line("   Status Code: " . $response->status());
            }

        } catch (\Exception $e) {
            $this->error("❌ Exception: " . $e->getMessage());
        }

        $this->newLine();
        $this->info('✅ Test tamamlandı!');

        return Command::SUCCESS;
    }
}
