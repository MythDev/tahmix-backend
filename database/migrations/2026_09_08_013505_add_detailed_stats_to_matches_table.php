<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            // API-Football İlişki ID'leri
            $table->unsignedBigInteger('league_id')->nullable()->after('fixture_id');
            $table->unsignedInteger('season')->nullable()->after('league_id');
            $table->unsignedBigInteger('home_team_id')->nullable()->after('league_logo');
            $table->unsignedBigInteger('away_team_id')->nullable()->after('home_team_id');

            // Skor & Süre Detayları
            $table->string('round')->nullable()->after('match_status'); // Örn: Regular Season - 24
            $table->string('halftime_score')->nullable()->after('away_score'); // Örn: 1-0

            // Detaylı Analiz & İstatistik Verileri (JSON olarak saklanır)
            $table->json('h2h_data')->nullable()->after('away_form'); // Son 5 maç & istatistikleri
            $table->json('standings_data')->nullable()->after('h2h_data'); // İki takımın puan tablosu özeti
            $table->json('match_stats')->nullable()->after('standings_data'); // Şut, korner, topla oynama
            $table->json('lineups')->nullable()->after('match_stats'); // İlk 11'ler ve diziliş

            // Daha önce migration'da eksik kalmış olabilecek alanlar (garantiye alıyoruz)
            if (!Schema::hasColumn('matches', 'analysis')) {
                $table->text('analysis')->nullable();
            }
            if (!Schema::hasColumn('matches', 'confidence')) {
                $table->unsignedTinyInteger('confidence')->default(80);
            }
            if (!Schema::hasColumn('matches', 'home_form')) {
                $table->string('home_form')->nullable();
            }
            if (!Schema::hasColumn('matches', 'away_form')) {
                $table->string('away_form')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn([
                'league_id',
                'season',
                'home_team_id',
                'away_team_id',
                'round',
                'halftime_score',
                'h2h_data',
                'standings_data',
                'match_stats',
                'lineups',
            ]);
        });
    }
};
