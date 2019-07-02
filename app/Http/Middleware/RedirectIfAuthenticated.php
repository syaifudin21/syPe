<?php

namespace App\Http\Middleware;

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
        switch ($guard){
            case 'outlet':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('outlet.home');
                }
                break;
            case 'ownner':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('ownner.home');
                }
                break;
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('pasien.home');
                }
                break;
        }


        return $next($request);
    }
}
