<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class poewrCheck
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
        $result=DB::SELECT('SELECT UserCondition FROM User WHERE `UserName` = ?',[session('UserName')]);
        if($result[0]->UserCondition==1||$result[0]->UserCondition==2)
            return $next($request);
        else
            return redirect('main');
    }
}
