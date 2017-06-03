<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class RegController extends Controller
{
    public function RegIn(Request $Request)
    {

    	$test=DB::select('SELECT `UserPwd` FROM user WHERE UserName = ?',[htmlentities($Request->UserName)]);
    	if(count($test)!=0)
    	{
    		return view('reg')->with('wrong','用户名已经使用');
    	}
    	$result=DB::insert('INSERT INTO user (`UserName`,`UserPwd`,`UserCondition`) VALUES (?,?,?)',[htmlentities($Request->UserName),md5(htmlentities($Request->UserPwd)),$Request->power]);
    	session(['UserName'=>$Request->UserName,
    		'power'=>$Request->power]);
    return redirect('main');
    }

    public function killSession(Request $Request){
    	$Request->session()->flush();
    	return 'session killed';
    }
}
