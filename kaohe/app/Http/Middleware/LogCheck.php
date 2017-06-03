<?php

namespace App\Http\Middleware;

use Closure;

class LogCheck
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
        if(session('UserName'))
            return redirect('main');
        return $next($request);
    }
}
