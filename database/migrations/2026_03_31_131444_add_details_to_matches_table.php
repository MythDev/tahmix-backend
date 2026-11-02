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
            $table->text('analysis')->nullable()->after('prediction'); // Analiz yazın
            $table->integer('confidence')->nullable()->default(80)->after('analysis'); // %80 güven
            $table->string('home_form')->nullable()->after('home_score'); // Örn: W,W,L,W,D
            $table->string('away_form')->nullable()->after('away_score'); // Örn: L,D,W,L,W
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            //
        });
    }
};
