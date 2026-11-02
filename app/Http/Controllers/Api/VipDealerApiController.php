<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use App\Models\Matchs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VipDealerApiController extends Controller
{
    /**
     * VIP Bayi Maçlarını Getir (Sadece onaylı kullanıcılar için)
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Kullanıcı VIP Bayi onaylı mı kontrol et
        if (!$user || !$user->is_vip_dealer_approved) {
            return response()->json([
                'approved' => false,
                'message' => 'VIP Bayi maçlarını görüntülemek için onay gereklidir.',
                'whatsapp_number' => '+90 555 123 45 67', // Buraya kendi WhatsApp numaranızı yazın
            ], 403);
        }

        // Bugün ve yarının VIP Bayi maçlarını getir
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow()->endOfDay();

        $matches = Matchs::where('is_vip_dealer', true)
            ->whereBetween('match_date', [$today, $tomorrow])
            ->whereNotNull('prediction')
            ->orderBy('match_date', 'asc')
            ->get();

        return response()->json([
            'approved' => true,
            'data' => MatchResource::collection($matches),
        ]);
    }

    /**
     * VIP Bayi Onay Durumunu Kontrol Et
     */
    public function checkApproval(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'approved' => false,
                'message' => 'Giriş yapmanız gerekiyor.',
            ], 401);
        }

        return response()->json([
            'approved' => $user->is_vip_dealer_approved,
            'approved_at' => $user->vip_dealer_approved_at,
            'whatsapp_number' => '+90 555 123 45 67', // Buraya kendi WhatsApp numaranızı yazın
        ]);
    }
}
