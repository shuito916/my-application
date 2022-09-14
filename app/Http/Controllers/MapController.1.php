<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function maps(Request $request){
        $latlngList = array("35.25784309376972,136.21910095558135");
        $key = 'AIzaSyAxU7ILtWN8SB8nZ4Gvls2HoaJlcY5UEfg';
        $keyword = 'コンビニ';
        $arr1 = [];
        
        foreach($latlngList as $latlng){
            $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latlng.'&radius=500&language=ja&keyword='.$keyword.'&key='.$key;
            $data = json_decode(@file_get_contents($url), true);
            foreach($data["results"] as $info){
                $lat = $info["geometry"]["location"]["lat"]; //対象施設の緯度
                $lng = $info["geometry"]["location"]["lng"]; //対象施設の経度
                $name = $info["name"]; //対象施設の名前
                array_push($arr1, [$lat,$lng,$name]);
            }
        }
        
        return view('/welcome')->with(['arr1' => $arr1]);
    }
}
