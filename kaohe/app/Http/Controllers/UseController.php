<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\HTTP\Controllers\stuController;

class UseController extends Controller
{
    /*public function DependPower(Request $request)
    {
        $result=stuController($stuNum);
        if($request->session()->get('power')==0)
        {
            UseController::changeSelfInfo($request,$result);
        }
    }*/
    public function changeSelfInfo(Request $request)
    {
        $UserName=session('UserName');
        $Student=new stuController;
        $result=$Student->stuInfo($UserName);
        return view('Information')->with('result',$result[0]);
    }



    public function changeSelfInfoUp(Request $request)
    {
        DB::update('UPDATE StuInfo SET 
            `StuName` = ?,
            `StuSex` = ?,
            `StuClass` = ?,
            `StuMajor` = ?,
            `StuAca` = ?,
            `StuGrade` = ?
             WHERE StuNum = ?' , [$request->StuName  , $request->StuSex , $request->StuClass , $request->StuMajor , $request->StuAca , $request->StuGrade , session('UserName')]);
        return "update successfully";
    }

    public function queryInfo($stuNum)
    {
        $Student=new stuController;
        $result=$Student->stuInfo($stuNum);
        return view('stuInfo')->with('result',$result[0]);
    }

    public function changeInfoView()
    {
        return view('InfoQuery');
    }


    public function changeInfo(Request $request)
    {

        $Student=new stuController;
        $result=$Student->stuInfo($request->stuNum);
        return view('Information')->with('result',$result[0]);
    }

    public function changeInfoUp(Request $request)
    {
            DB::update('UPDATE StuInfo SET 
            `StuName` = ?,
            `StuSex` = ?,
            `StuClass` = ?,
            `StuMajor` = ?,
            `StuAca` = ?,
            `StuGrade` = ?
             WHERE StuNum = ?' , [$request->StuName  , $request->StuSex , $request->StuClass , $request->StuMajor , $request->StuAca , $request->StuGrade , $request->StuNum]);
        return "update successfully";
    }

    public function deleteStuInfo($stuNum)
    {
        DB::delete('DELETE FROM StuInfo WHERE StuNum = ?',[$stuNum]);
        return "delete successfully";
    }

    public function BBSupdate(Request $Request)
    {
        DB::update('UPDATE BBS SET `Content`= ?
            ,`Updater`=? WHERE id = 1',[$Request->content,$Request->Updater]);
        return "BBS update successfully";
    }


    public function PlusPower(){
        return view('PlusInput');
    }
    public function PlusPowerUp(Request $request)
    {
        DB::update('UPDATE user SET UserCondition = ? WHERE UserName = ?',[$request->poewr,$request->UserName]);
        return 'PlusPower successfully';
    }


    public function InfoOut()
    {

    }
}
