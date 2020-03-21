<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && auth()->user()->is_admin()) {
            // return redirect(RouteServiceProvider::HOME);
            return redirect()->route('backend.dashboard');
        }
        elseif(Auth::guard($guard)->check() && auth()->user()->is_author()){
            return redirect()->route('author.dashboard');
        }
        else{
            return $next($request);
        }

    }
}
