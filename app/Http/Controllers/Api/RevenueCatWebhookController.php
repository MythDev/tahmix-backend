<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RevenueCatWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Güvenlik: Webhook Authorization Header doğrulaması
        $authHeader = $request->header('Authorization');
        $expectedToken = config('services.revenuecat.webhook_secret');

        if ($expectedToken && $authHeader !== 'Bearer ' . $expectedToken) {
            Log::warning('RevenueCat Webhook yetkisiz erişim denemesi!');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $event = $request->input('event');
        if (!$event) {
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        $type = $event['type'] ?? null;
        $appUserId = $event['app_user_id'] ?? null; // Flutter'dan gönderdiğimiz User ID

        // Kullanıcıyı bul
        $user = User::find($appUserId);
        if (!$user) {
            // Eğer Flutter tarafında id değil de e-posta gönderildiyse:
            $user = User::where('email', $appUserId)->first();
        }

        if (!$user) {
            Log::warning("RevenueCat Webhook: Kullanıcı bulunamadı (ID: {$appUserId})");
            return response()->json(['message' => 'User not found'], 200); // 200 dönüyoruz ki RevenueCat sürekli tekrar denemesin
        }

        // Tarih formatlama (RevenueCat milisaniye timestamp gönderir)
        $expiresAt = isset($event['expiration_at_ms'])
            ? Carbon::createFromTimestampMs($event['expiration_at_ms'])
            : null;

        $purchasedAt = isset($event['purchased_at_ms'])
            ? Carbon::createFromTimestampMs($event['purchased_at_ms'])
            : Carbon::now();

        $store = strtolower($event['store'] ?? 'unknown');

        switch ($type) {
            case 'INITIAL_PURCHASE':
            case 'RENEWAL':
            case 'PRODUCT_CHANGE':
                $user->updateSubscription([
                    'platform' => $store, // 'app_store' veya 'play_store' yazar
                    'product_id' => $event['product_id'] ?? null,
                    'started_at' => $purchasedAt,
                    'expires_at' => $expiresAt,
                    'auto_renew' => true,
                ]);
                break;

            case 'CANCELLATION':
                // İptal edildiğinde süre sonuna kadar premium devam eder, ancak auto_renew false olur
                $user->update([
                    'subscription_auto_renew' => false,
                ]);
                break;

            case 'EXPIRATION':
                // Abonelik süresi tamamen bitti
                $user->expireSubscription();
                break;

            default:
                Log::info("RevenueCat işlenmeyen olay tipi: {$type}");
                break;
        }

        return response()->json(['status' => 'success'], 200);
    }
}
