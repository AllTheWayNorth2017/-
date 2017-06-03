<?php

namespace App\Http\Middleware;

use Closure;

class AllCheck
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
        if(!$request->session()->has('UserName'))
            return redirect('login');
        return $next($request);
    }
}
