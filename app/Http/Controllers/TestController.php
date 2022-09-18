<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request){
        return view('/test');
    }
    
    public function test2(Request $request){
        
        $ABC = $request->ABC;
        return view('/test2')->with(['ABC'=>$ABC]);
    }
}
