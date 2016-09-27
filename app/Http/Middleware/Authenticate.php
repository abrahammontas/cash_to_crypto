<?php

namespace App\Http\Middleware;

use Closure;
use App\Survey;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }

            return redirect()->guest('login');
        }

        if (!Survey::where('user_id','=',Auth::user()->id)->first()) {
            return redirect('survey');
        }
        return $next($request);
    }
}
