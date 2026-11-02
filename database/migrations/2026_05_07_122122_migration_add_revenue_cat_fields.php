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
        Schema::table('users', function (Blueprint $table) {
            // RevenueCat customer ID
            $table->string('revenue_cat_customer_id')->nullable()->after('google_id');

            // Premium subscription bilgileri (RevenueCat'ten senkronize edilecek)
            $table->string('subscription_platform')->nullable()->after('premium_until'); // 'android' veya 'ios'
            $table->string('subscription_product_id')->nullable()->after('subscription_platform'); // 'monthly', 'yearly', vb.
            $table->timestamp('subscription_started_at')->nullable()->after('subscription_product_id');
            $table->timestamp('subscription_expires_at')->nullable()->after('subscription_started_at');
            $table->boolean('subscription_auto_renew')->default(true)->after('subscription_expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'revenue_cat_customer_id',
                'subscription_platform',
                'subscription_product_id',
                'subscription_started_at',
                'subscription_expires_at',
                'subscription_auto_renew',
            ]);
        });
    }
};
