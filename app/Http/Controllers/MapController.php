<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function maps(Request $request){
        $latlngList = array("35.25784309376972,136.21910095558135");
        $key = 'AIzaSyA_kEcDSd-BsVaL1DijTXjK4QwO0TCdpes';
        $keyword = 'コンビニ';
        foreach($latlngList as $latlng){
            $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latlng.'&radius=100&language=ja&keyword='.$keyword.'&key='.$key;
            $data= json_decode(@file_get_contents($url), true);
            foreach($data["results"] as $info){
                $lat = $info["geometry"]["location"]["lat"]; //対象施設の緯度
                $lng = $info["geometry"]["location"]["lng"]; //対象施設の経度
                //緯度経度をもとに日本語の住所を取得
                $geo = json_decode(@file_get_contents('https://maps.google.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false&language=ja'), true);
                $address = $geo['results'][0]['formatted_address'];
            }
        }
        
        
        
        return view('/welcome')->with(['latlngList' => $latlngList]);
    }
}
