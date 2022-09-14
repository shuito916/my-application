<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request){
        $raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
        $data = json_decode($raw); // json形式をphp変数に変換
        
        $res = $data; // やりたい処理
        
        return view('/test')->with(['data' => $data]);
    }
}
