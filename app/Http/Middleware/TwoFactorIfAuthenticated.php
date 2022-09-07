<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class TwoFactorIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() == true) {
            if(Auth::user()->g2f_enabled == 1) {
                $authenticator = app(Authenticator::class)->boot($request);

                if ($authenticator->isAuthenticated()) {
                    return $next($request);
                }

                return $authenticator->makeRequestOneTimePasswordResponse();
            }
        }
        return $next($request);
    }
}
