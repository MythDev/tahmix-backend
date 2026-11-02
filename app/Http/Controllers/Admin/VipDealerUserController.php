<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VipDealerUserController extends Controller
{
    /**
     * VIP Bayi Kullanıcılarını Listele
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.vip-dealer-users.index', compact('users'));
    }

    /**
     * VIP Bayi Kullanıcı Düzenleme Formu
     */
    public function edit(User $user)
    {
        return view('admin.vip-dealer-users.edit', compact('user'));
    }

    /**
     * VIP Bayi Kullanıcı Güncelle
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'is_vip_dealer_approved' => 'required|boolean',
        ]);

        // Eğer onay durumu değiştiyse, onay tarihini güncelle
        if ($validated['is_vip_dealer_approved'] && !$user->is_vip_dealer_approved) {
            $validated['vip_dealer_approved_at'] = now();
        } elseif (!$validated['is_vip_dealer_approved']) {
            $validated['vip_dealer_approved_at'] = null;
        }

        $user->update($validated);

        return redirect()
            ->route('admin.vip-dealer-users.index')
            ->with('success', 'Kullanıcı başarıyla güncellendi!');
    }

    /**
     * VIP Bayi Onayını Hızlı Değiştir (Toggle)
     */
    public function toggleApproval(User $user)
    {
        $user->is_vip_dealer_approved = !$user->is_vip_dealer_approved;
        $user->vip_dealer_approved_at = $user->is_vip_dealer_approved ? now() : null;
        $user->save();

        return redirect()
            ->route('admin.vip-dealer-users.index')
            ->with('success', 'Kullanıcı onay durumu güncellendi!');
    }
}
