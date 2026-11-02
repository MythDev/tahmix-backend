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
        // Users tablosuna VIP Bayi onay alanı ekle
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_vip_dealer_approved')->default(false)->after('is_premium');
            $table->timestamp('vip_dealer_approved_at')->nullable()->after('is_vip_dealer_approved');
        });

        // Matches tablosuna VIP Bayi maçı alanı ekle
        Schema::table('matches', function (Blueprint $table) {
            $table->boolean('is_vip_dealer')->default(false)->after('is_premium');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_vip_dealer_approved', 'vip_dealer_approved_at']);
        });

        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn('is_vip_dealer');
        });
    }
};
