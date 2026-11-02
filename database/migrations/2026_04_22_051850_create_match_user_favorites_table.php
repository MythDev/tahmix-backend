<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('match_user_favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('match_id')->constrained('matches')->onDelete('cascade');
            $table->timestamps();

            // Bir kullanıcı aynı maçı birden fazla kez favorilere ekleyemez
            $table->unique(['user_id', 'match_id']);

            // Index'ler - performans için
            $table->index('user_id');
            $table->index('match_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('match_user_favorites');
    }
};
