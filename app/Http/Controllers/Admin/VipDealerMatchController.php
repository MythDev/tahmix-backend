<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matchs;
use Illuminate\Http\Request;

class VipDealerMatchController extends Controller
{
    /**
     * VIP Bayi Maçlarını Listele
     */
    public function index()
    {
        $matches = Matchs::where('is_vip_dealer', true)
            ->orderBy('match_date', 'desc')
            ->get();
            
        return view('admin.vip-dealer-matches.index', compact('matches'));
    }

    /**
     * VIP Bayi Maçı Düzenleme Formu
     */
    public function edit(Matchs $match)
    {
        return view('admin.vip-dealer-matches.edit', compact('match'));
    }

    /**
     * VIP Bayi Maçı Güncelle
     */
    public function update(Request $request, Matchs $match)
    {
        $validated = $request->validate([
            'prediction' => 'nullable|string|max:255',
            'odds' => 'nullable|numeric',
            'is_vip_dealer' => 'required|boolean',
            'prediction_status' => 'required|in:pending,won,lost,void',
            'confidence' => 'nullable|integer|min:0|max:100',
            'home_form' => 'nullable|string|max:50',
            'away_form' => 'nullable|string|max:50',
            'analysis' => 'nullable|string',
        ]);

        $match->update($validated);

        return redirect()
            ->route('admin.vip-dealer-matches.index')
            ->with('success', 'VIP Bayi maçı başarıyla güncellendi!');
    }
}
