<?php

namespace App\Http\Middleware;

use Closure;

class RedirectUnlessIncomplete
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

        if($request->user()->status!=0){
            return redirect('/');
        }

        return $next($request);
    }
}
