<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            // Takım ID'leri (Football API'den)
            $table->unsignedBigInteger('home_team_id')->nullable()->after('home_logo');
            $table->unsignedBigInteger('away_team_id')->nullable()->after('away_logo');
            $table->unsignedBigInteger('league_id')->nullable()->after('league_logo');

            // Ev sahibi takım istatistikleri
            $table->integer('home_wins')->nullable()->after('home_form');
            $table->integer('home_draws')->nullable()->after('home_wins');
            $table->integer('home_losses')->nullable()->after('home_draws');
            $table->integer('home_goals_for')->nullable()->after('home_losses');
            $table->integer('home_goals_against')->nullable()->after('home_goals_for');
            $table->integer('home_played')->nullable()->after('home_goals_against');

            // Deplasman takım istatistikleri
            $table->integer('away_wins')->nullable()->after('away_form');
            $table->integer('away_draws')->nullable()->after('away_wins');
            $table->integer('away_losses')->nullable()->after('away_draws');
            $table->integer('away_goals_for')->nullable()->after('away_losses');
            $table->integer('away_goals_against')->nullable()->after('away_goals_for');
            $table->integer('away_played')->nullable()->after('away_goals_against');

            // Son 5 maç formu (WWDLL formatında)
            $table->string('home_last_5_form')->nullable()->after('away_played');
            $table->string('away_last_5_form')->nullable()->after('home_last_5_form');

            // İstatistik güncellenme zamanı
            $table->timestamp('statistics_updated_at')->nullable()->after('away_last_5_form');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn([
                'home_team_id',
                'away_team_id',
                'league_id',
                'home_wins',
                'home_draws',
                'home_losses',
                'home_goals_for',
                'home_goals_against',
                'home_played',
                'away_wins',
                'away_draws',
                'away_losses',
                'away_goals_for',
                'away_goals_against',
                'away_played',
                'home_last_5_form',
                'away_last_5_form',
                'statistics_updated_at',
            ]);
        });
    }
};
