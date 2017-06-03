<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class LoginController extends Controller
{
    public function LoginIn(Request $Request) {
    	return redirect('main');
    }


    public function IsLogin(Request $Request)
    {
        if(!$Request->session()->has('UserName'))
            return view('login');
        else
            return redirect('user');
    }


    public function UserJudge(Request $Request)
    {
        $result=DB::select('SELECT `UserPwd` FROM user WHERE UserName = ?',[htmlentities($Request->UserName)]);
        if(empty($result))
        {
        	return view('login')->with('wrong','user is not exist');
        }
        if($result[0]->UserPwd==md5(htmlentities($Request->UserPwd)))
        {
        	session(['UserName'=>$Request->UserName]);
        	return LoginController::LoginIn($Request);
        }
        else
        	return view('login')->with('wrong','password is wrong');

    }
}
