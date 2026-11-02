<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\VipDealerMatchController;
use App\Http\Controllers\Admin\VipDealerUserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Admin\CouponController;
use Carbon\Carbon;


Route::get('/', [HomepageController::class, 'index'])->name('index');

Route::get('/test-api', function () {

    // 1. API KEY BAĞLANTISINI TEST ET (Hesap Durumunu Çekelim)
    $statusResponse = Http::withHeaders([
        'x-apisports-key' => env('API_FOOTBALL_KEY')
    ])->get('https://v3.football.api-sports.io/status');

    $statusData = $statusResponse->json();

    // 2. BUGÜNÜN TÜM MAÇLARINI ÇEK (Lig fark etmeksizin dünyadaki tüm maçlar)
    $today = Carbon::now()->format('Y-m-d');

    $fixturesResponse = Http::withHeaders([
        'x-apisports-key' => env('API_FOOTBALL_KEY')
    ])->get('https://v3.football.api-sports.io/fixtures', [
        'date' => $today
    ]);

    return response()->json([
        '1_API_HESAP_DURUMU' => $statusData,
        '2_BUGUNKU_MAC_SAYISI' => count($fixturesResponse->json()['response'] ?? []),
        '3_ILK_MAC_ORNEGI' => $fixturesResponse->json()['response'][0] ?? 'Bugün dünyada hiç maç yok!'
    ]);
});

// SADECE MİSAFİRLERE (GİRİŞ YAPMAMIŞLARA) AÇIK ROTALAR
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

// SADECE GİRİŞ YAPMIŞ VE "ADMIN" ROLÜNE SAHİP OLANLARA AÇIK ROTALAR
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard (Ana Sayfa)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
    Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');

    // VIP Bayi Maç Yönetimi
    Route::prefix('vip-dealer-matches')->name('vip-dealer-matches.')->group(function () {
        Route::get('/', [VipDealerMatchController::class, 'index'])->name('index');
        Route::get('/{match}/edit', [VipDealerMatchController::class, 'edit'])->name('edit');
        Route::put('/{match}', [VipDealerMatchController::class, 'update'])->name('update');
    });

    // VIP Bayi Kullanıcı Yönetimi
    Route::prefix('vip-dealer-users')->name('vip-dealer-users.')->group(function () {
        Route::get('/', [VipDealerUserController::class, 'index'])->name('index');
        Route::get('/{user}/edit', [VipDealerUserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [VipDealerUserController::class, 'update'])->name('update');
        Route::patch('/{user}/toggle-approval', [VipDealerUserController::class, 'toggleApproval'])->name('toggle-approval');
    });

    // Kupon Yönetimi (Hazır Kuponlar)
    Route::prefix('coupons')->name('coupons.')->group(function () {
        Route::get('/', [CouponController::class, 'index'])->name('index');
        Route::get('/create', [CouponController::class, 'create'])->name('create');
        Route::post('/', [CouponController::class, 'store'])->name('store');
        Route::get('/{coupon}/edit', [CouponController::class, 'edit'])->name('edit');
        Route::put('/{coupon}', [CouponController::class, 'update'])->name('update');
        Route::delete('/{coupon}', [CouponController::class, 'destroy'])->name('destroy');
    });

    // Çıkış Yap
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // İleride buraya Maç Ekleme, Kullanıcıları Görme gibi rotaları ekleyeceğiz.
});
