<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Photo
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
        //if (!Auth::user()->photoid || !Auth::user()->photo) {
        if (!Auth::user()->photoid) {
            return redirect()->route('profile');
        }

        return $next($request);
    }
}
