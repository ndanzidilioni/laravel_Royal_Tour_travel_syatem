<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RestrictSelfUpdates
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
        $user = $request->route();
        if(Auth::user()->id == $user->parameter('employee')) {
            return response('Self updates are restricted', 401);
        } else {
            return $next($request);
        }
    }
}
