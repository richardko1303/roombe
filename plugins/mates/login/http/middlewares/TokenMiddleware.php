<?php

namespace Mates\Login\Http\middlewares;

use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Middleware;
use Mates\Login\Models\Token;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next) {
        $token = $request->headers->get('token');;

        $tokenUser = Token::where('token', $token)->first();

        if (!$tokenUser) {
            return response()->json([
                'error' => 'Token not found'
            ], 401);
        }

        if (Carbon::create($tokenUser->token_created_at)->diffInMinutes(Carbon::now()) > 60) {
            return response()->json([
                'error' => 'Token expired'
            ], 401);
        }

        $request->attributes->add(['tokenUserID' => $tokenUser->user_id]);

        return $next($request);
    }
}
