<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use APP\Http\Controllers\LoginController;

class InputCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!$request->UserPwd)
        {
            return view('login')->with('wrong','password loss!');
        }
        if(($request->power==0&&count($request->UserName)!=10)||ctype_digit($request->UserName))
            view('login')->with('wrong','学生注册需要使用学号!');
        if(ctype_alnum($request->UserName))
        {
            return $next($request);
        }
        else
        {
            if($request->log==1)
                return view('login')->with('wrong','格式不对!');
            if($request->reg==1)
                return view('reg')->with('wrong','格式不对');
        }
            

    }
}
