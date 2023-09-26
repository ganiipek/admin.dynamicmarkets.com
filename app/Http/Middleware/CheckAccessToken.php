<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

use Closure;
use Illuminate\Http\Request;

class CheckAccessToken
{
    public function handle($request, Closure $next)
    {
        if (session()->has('user') == false) {
            return redirect('login');
        }
        if (session()->has('fingerprint') == false) {
            return redirect('login');
        }
        if ($request->hasCookie('refresh_token') == false) {
            return redirect('login');
        }

        return $next($request);
    }
}