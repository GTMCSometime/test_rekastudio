<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TokenAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $api_token = $request->bearerToken();
        $user = User::where("api_token", $api_token)->first();
        if (!$user) {
            return response()->json([
                'error' => 'Ошибка авторизациию. Некорректный токен!',
                'data' => $api_token], 401);
            }


            Auth::login($user);
            return $next($request);
    }
}
