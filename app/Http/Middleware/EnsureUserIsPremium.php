<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsPremium
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || !$user->is_premium) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bu içeriği görüntülemek için aktif bir VIP üyeliğinizin olması gerekmektedir.',
                'code' => 'PREMIUM_REQUIRED'
            ], 403);
        }

        return $next($request);
    }
}
