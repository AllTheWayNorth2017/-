<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('test/{stuNum}',
	['middleware'=>'check',
	'uses'=>'testController@test']);



Route::any('login',['as'=>'loginView',
	'middleware'=>'LogCheck',
	function()
	{
		return view('login');
	}]);

Route::match(['get','post'],'login/sure',[
	'as' => 'login',
	'middleware' => 'InputCheck',
	'uses' => 'LoginController@UserJudge'
	]);

Route::any('reg',['as'=>'regView','middleware'=>'LogCheck',function(){
	return view('reg');
}]);

Route::match(['get','post'],'reg/sure',[
	'as' => 'reg',
	'middleware'=>'InputCheck',
	'uses'=>'RegController@RegIn'
	]);


//查看学生信息

//查看学生课表


//测试路由销毁session
Route::get('sessionKill','RegController@killSession');


/*Route::group(['middleware' => 'AllCheck'],function() {
	Route::get('changeStuInfo/self','UseController@changeSelfInfo')->name('SelfInfo');
	Route::post('changeStuInfo/self/update','UseController@changeSelfInfoUp')->name('SelfChange');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'AllCheck'], function () {

	Route::get('main',function(){
	$result=DB::select('SELECT * FROM BBS WHERE id =1');
	return view('mainPage')->with('BBS',$result[0]);
	});

	Route::get('stuClassForm',function(){
		return view('classtable');
	})->name('ClassFormView');

	Route::post('stuClassForm/up','stuController@stuClassForm')->name('ClassForm');

	//修改,删除学生信息
	Route::get('deleteStuInfo/{stuNum}','UseController@deleteStuInfo')->name('deleteInfo');
	Route::get('changeStuInfo/self','UseController@changeSelfInfo')->name('SelfInfo');
	Route::post('changeStuInfo/self/update','UseController@changeSelfInfoUp')->name('SelfChange');

	Route::group(['middleware'=>'powerCheck'],function(){
		Route::get('changeStuInfo/view',function ()
		{
			return view('InfoQuery');
		})->name('stuInfoView');
		Route::post('changeStuInfo/stu','UseController@changeInfo')->name('stuInfo');
		//删除

		//导出文件
		Route::get('InfoOut',"UseController@InfoOut")->name('InfoOut');

		Route::get('BBS',function(){
			$result=DB::select('SELECT * FROM BBS WHERE id =1');
			return view('BBSUpdate')->with('BBS',$result[0]);
		})->name('BBS');
		Route::post('BBS/up','UseController@BBSupdate')->name('BBSupdate');		
		});

		Route::group(['middleware'=>'powerPlus'],function(){
			Route::get('PlusPower','UseController@PlusPower');
			Route::post('PlusPower/up','UseController@PlusPowerUp')->name('Plus');
		});

	});
