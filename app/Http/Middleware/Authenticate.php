<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Admin paneline erişilmeye çalışılıyorsa
        if ($request->is('admin/*') || $request->routeIs('admin.*')) {
            return route('admin.login');
        }

        // Normal kullanıcı login sayfası (ileride eklenecek)
        return route('login');
    }
}
