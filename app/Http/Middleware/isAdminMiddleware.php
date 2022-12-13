<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class isAdminMiddleware
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

        $adminTypes = Auth::user()->admin;
        if ($adminTypes == null || $adminTypes->isEmpty()) {
            return response('Unauthorized', 401);
        } else {
            foreach ($adminTypes as $item) {
                if ($item->type == 'Admin' || $item->type == 'Management') {
                    return $next($request);
                }
            }
            return response('Unauthorized', 401);
        }

    }
}
