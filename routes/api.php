<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\RevenueCatWebhookController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\VipDealerApiController;

// 1. REVENUECAT WEBHOOK ROTASI (Dışarıdan RevenueCat sunucuları erişecek)
Route::post('/webhooks/revenuecat', [RevenueCatWebhookController::class, 'handle']);

// 2. HERKESE AÇIK AUTH ROTALARI
Route::post('/auth/google', [AuthController::class, 'googleAuth']);

Route::middleware('throttle:6,1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
});

// 3. GİRİŞ YAPMIŞ TÜM KULLANICILAR (ÜCRETSİZ / STANDART)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::delete('/account', [AuthController::class, 'deleteAccount']);

    Route::get('/matches/daily', [MatchController::class, 'dailyMatches']);
    Route::get('/matches/history', [MatchController::class, 'history']);
    Route::get('/matches/statistics', [MatchController::class, 'statistics']);

    Route::get('/matches/favorites', [MatchController::class, 'favorites']);
    Route::post('/matches/{id}/favorite', [MatchController::class, 'toggleFavorite']);

    Route::get('/matches/{id}', [MatchController::class, 'show'])->whereNumber('id');

    // Kupon Rotaları (Ücretsiz & Günlük)
    Route::get('/coupons/daily', [CouponController::class, 'dailyCoupons']);
    Route::get('/coupons/history', [CouponController::class, 'history']);
});

Route::middleware('auth:sanctum')->prefix('vip-dealer')->group(function () {
    Route::get('/matches', [VipDealerApiController::class, 'index']);
    Route::get('/check-approval', [VipDealerApiController::class, 'checkApproval']);
});

// 4. SADECE VIP/PREMIUM KULLANICILARIN ERİŞEBİLECEĞİ ROTALAR
Route::middleware(['auth:sanctum', 'is_premium'])->group(function () {
    // VIP maçları buraya alıyoruz!
    Route::get('/matches/vip', [MatchController::class, 'vipMatches']);
    // VIP Kuponlar
    Route::get('/coupons/vip', [CouponController::class, 'vipCoupons']);
});
