<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Giriş Sayfasını Göster
    public function showLogin()
    {
        return view('admin.login');
    }

    // Giriş Yapma İşlemi
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Eğer giriş yapan kişi 'admin' rolüne sahip değilse, at gitsin!
            if (!$user->hasRole('admin')) {
                Auth::logout();
                return back()->withErrors(['email' => 'Bu panele erişim yetkiniz yok!']);
            }

            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Hatalı e-posta veya şifre.']);
    }

    // Çıkış Yapma
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
