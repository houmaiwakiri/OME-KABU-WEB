<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Token;

/**
 * RequestとResponseの中間で処理を行う
 */
class TokenAuthMiddleware
{
    /**
     * クッキーにaccess_tokenが存在するか確認
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     */
    public function handle(Request $request, Closure $next)
    {
        $accessToken = $request->cookie('access_token');

        if (!$accessToken || !Token::where('access_token', $accessToken)->exists()) {
            return redirect('/login');
        }

        return $next($request);
    }
}