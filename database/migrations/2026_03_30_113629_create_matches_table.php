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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            // API-Football Data
            $table->unsignedBigInteger('fixture_id')->unique();
            $table->string('league_name');
            $table->string('league_logo')->nullable();
            $table->string('home_team');
            $table->string('home_logo')->nullable();
            $table->string('away_team');
            $table->string('away_logo')->nullable();
            $table->dateTime('match_date');
            $table->string('match_status')->default('NS');
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->string('prediction')->nullable();
            $table->decimal('odds', 4, 2)->nullable();
            $table->boolean('is_premium')->default(true);
            $table->enum('prediction_status', ['pending', 'won', 'lost', 'void'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
