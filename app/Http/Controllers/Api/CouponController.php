<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // Günün Aktif Kuponları (Sadece durumu pending / bekleyenler)
    public function dailyCoupons(Request $request)
    {
        $coupons = Coupon::with(['couponMatches.match'])
            ->where('status', 'pending')
            ->orderBy('is_premium', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => CouponResource::collection($coupons),
        ]);
    }

    // Geçmiş Kuponlar (Kazandı, Kaybetti veya İptal olanlar)
    public function history(Request $request)
    {
        $coupons = Coupon::with(['couponMatches.match'])
            ->whereIn('status', ['won', 'lost', 'void'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => CouponResource::collection($coupons),
        ]);
    }
}
