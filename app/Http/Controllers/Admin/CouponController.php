<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponMatch;
use App\Models\Matchs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::with(['couponMatches.match'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        $matches = Matchs::where('match_date', '>=', now()->subDays(2))
            ->orderBy('match_date', 'asc')
            ->get();

        return view('admin.coupons.create', compact('matches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'is_premium'   => 'required|boolean',
            'status'       => 'required|in:pending,won,lost,void',
            'confidence'   => 'nullable|integer|min:0|max:100',
            'note'         => 'nullable|string',
            'matches'      => 'required|array|min:1',
            'matches.*.match_id'   => 'required|exists:matches,id',
            'matches.*.prediction' => 'required|string|max:100',
            'matches.*.odds'       => 'required|numeric|min:1.01',
        ]);

        DB::beginTransaction();
        try {
            $totalOdds = 1.0;
            foreach ($request->matches as $m) {
                $totalOdds *= (float) $m['odds'];
            }
            $totalOdds = round($totalOdds, 2);

            $coupon = Coupon::create([
                'title'       => $request->title,
                'is_premium'  => $request->is_premium,
                'total_odds'  => $totalOdds,
                'status'      => $request->status,
                'confidence'  => $request->confidence ?? 85,
                'note'        => $request->note,
            ]);

            foreach ($request->matches as $item) {
                CouponMatch::create([
                    'coupon_id'  => $coupon->id,
                    'match_id'   => $item['match_id'],
                    'prediction' => $item['prediction'],
                    'odds'       => $item['odds'],
                    'status'     => $item['status'] ?? 'pending',
                ]);
            }

            DB::commit();
            return redirect()->route('admin.coupons.index')->with('success', 'Kupon başarıyla oluşturuldu!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Hata oluştu: ' . $e->getMessage());
        }
    }

    public function edit(Coupon $coupon)
    {
        $coupon->load('couponMatches.match');

        // Kupondaki maçların ID'lerini garantiye alıyoruz (Asla listeden düşmezler)
        $existingMatchIds = $coupon->couponMatches->pluck('match_id')->toArray();

        $matches = Matchs::whereIn('id', $existingMatchIds)
            ->orWhere('match_date', '>=', now()->subDays(10))
            ->orderBy('match_date', 'desc')
            ->get();

        return view('admin.coupons.edit', compact('coupon', 'matches'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'is_premium'   => 'required|boolean',
            'status'       => 'required|in:pending,won,lost,void',
            'confidence'   => 'nullable|integer|min:0|max:100',
            'note'         => 'nullable|string',
            'matches'      => 'required|array|min:1',
            'matches.*.match_id'   => 'required|exists:matches,id',
            'matches.*.prediction' => 'required|string|max:100',
            'matches.*.odds'       => 'required|numeric|min:1.01',
            'matches.*.status'     => 'required|in:pending,won,lost,void',
        ]);

        DB::beginTransaction();
        try {
            $totalOdds = 1.0;
            foreach ($request->matches as $m) {
                $totalOdds *= (float) $m['odds'];
            }
            $totalOdds = round($totalOdds, 2);

            $coupon->update([
                'title'       => $request->title,
                'is_premium'  => $request->is_premium,
                'total_odds'  => $totalOdds,
                'status'      => $request->status,
                'confidence'  => $request->confidence,
                'note'        => $request->note,
            ]);

            // Mevcut maçları temizleyip güncel durumlarıyla (won/lost/pending) eksiksiz yeniden oluşturalım
            $coupon->couponMatches()->delete();

            foreach ($request->matches as $item) {
                CouponMatch::create([
                    'coupon_id'  => $coupon->id,
                    'match_id'   => $item['match_id'],
                    'prediction' => $item['prediction'],
                    'odds'       => $item['odds'],
                    'status'     => $item['status'],
                ]);
            }

            DB::commit();
            return redirect()->route('admin.coupons.index')->with('success', 'Kupon başarıyla güncellendi!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Hata oluştu: ' . $e->getMessage());
        }
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('success', 'Kupon silindi.');
    }
}
