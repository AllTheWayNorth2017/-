<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class powerPlus
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
        $result=DB::select('SELECT UserCondition FROM user WHERE UserName=?',[session('UserName')]);
        if($result[0]->UserCondition==2)
            return $next($request);
        else
            return redirect('main');
    }
}
