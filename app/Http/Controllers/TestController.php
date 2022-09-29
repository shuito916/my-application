<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request){
        return view('/test');
    }
    
    public function test2(Request $request){
        
        $seikai = $request->seikai;
        return view('/test2')->with(['seikai'=>$seikai]);
    }
    
    public function test3(Request $request){
        
        $key = config("services.google-map.apikey");
        $keyword = 'パスタ';
            
        $arr1 = [];
        
        foreach($latlngList as $latlng){
            $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latlng.'&radius=5000&language=ja&keyword='.$keyword.'&key='.$key;
            $data = json_decode(@file_get_contents($url), true);
            return view('/test');
        }
    }
}

    