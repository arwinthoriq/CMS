<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AksesPenulis
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
        if(Auth::user()->akses == 'penulis'){

        return $next($request);
        } 
        return abort(404);
    }
}
