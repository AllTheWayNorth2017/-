<?php

namespace App\Http\Middleware;

use Closure;

class checkStudentNum
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
        if (!ctype_digit($request->stuNum)){
            return redirect('test');
        }
        return $next($request);
    }
}
