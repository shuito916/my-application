<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
        public function index()
    {
 
        $rg01Datas = [
            "op1" => "ちょっといいもの食べたいな！（約3000円～）",
            "op2" => "こだわりはないかな　　　　　（約800円～2000円）",
            "op3" => "今日はちょっと抑えめで、、　（～約800円）"
        ];
        $rg01Checked = "op2";
        
        $rg02Datas = [
            "opt1" => "めっちゃお腹すいた～！　　　　　（空腹度：大）",
            "opt2" => "そんなにがっつりはいらないかな～（空腹度：中）",
            "opt3" => "今日はあっさりで行こう！　　　　（空腹度：小）"
        ];
        $rg02Checked = "opt2";
        
  
        return view('/top', compact(
            'rg01Datas',
            'rg01Checked',
            'rg02Datas',
            'rg02Checked',
        ));
    }
    
     public function category(Request $request)
    {
            $radioGrp01 = $request->radioGrp01;
            $radioGrp02 = $request->radioGrp02;
            
            
            $sentakusi = [["op1","op2","op3"],["opt1","opt2","opt3"]];
            
            $cate1 = ["焼肉","ステーキ","かつ"];
            $cate2 = ["焼き鳥","居酒屋","鍋","韓国料理","すき焼き","串カツ","海鮮丼"];
            $cate3 = "和食";
            $cate4 = ["回転ずし","ハンバーグ","牛丼","焼肉","お好み焼き","中華料理","ステーキ","かつ","豚丼","天丼"];
            $cate5 = ["ラーメン","オムライス","洋食屋","焼き鳥","居酒屋","たこ焼き","韓国料理","鍋","カレー","ファミレス","パスタ","ピザ","アジア・エスニック","すき焼き","おでん","串カツ","海鮮丼"];
            $cate6 = ["和食","冷麺","うどん","そば"];
            $cate7 = ["牛丼","豚丼"];
            $cate8 = ["ファミレス","たこ焼き"];
            $cate9 = "うどん";
            
            
            if($radioGrp01 == $sentakusi[0][0] && $radioGrp02 == $sentakusi[1][0]){
                $r = rand(0,count($cate1)-1);
                $janl = $cate1[$r];
            } elseif($radioGrp01 == $sentakusi[0][0] && $radioGrp02 == $sentakusi[1][1]) {
                $r = rand(0,count($cate2)-1);
                $janl = $cate2[$r];
            } elseif($radioGrp01 == $sentakusi[0][0] && $radioGrp02 == $sentakusi[1][2]) {
                $janl = $cate3;
            } elseif($radioGrp01 == $sentakusi[0][1] && $radioGrp02 == $sentakusi[1][0]) {
                $r = rand(0,count($cate4)-1);
                $janl = $cate4[$r];
            } elseif($radioGrp01 == $sentakusi[0][1] && $radioGrp02 == $sentakusi[1][1]) {
                $r = rand(0,count($cate5)-1);
                $janl = $cate5[$r];
            } elseif($radioGrp01 == $sentakusi[0][1] && $radioGrp02 == $sentakusi[1][2]) {
                $r = rand(0,count($cate6)-1);
                $janl = $cate6[$r];
            } elseif($radioGrp01 == $sentakusi[0][2] && $radioGrp02 == $sentakusi[1][0]) {
                $r = rand(0,count($cate7)-1);
                $janl = $cate7[$r];
            } elseif($radioGrp01 == $sentakusi[0][2] && $radioGrp02 == $sentakusi[1][1]) {
                $r = rand(0,count($cate8)-1);
                $janl = $cate8[$r];
            } elseif($radioGrp01 == $sentakusi[0][2] && $radioGrp02 == $sentakusi[1][2]) {
                $janl = $cate9;
            } 
            
            
            $curent_lat = 35.25784309376972;
            $curent_lng = 136.21910095558135;
            
            $lat_string = (string)$curent_lat;
            $lng_string = (string)$curent_lng;
            
            $latlngList = $lat_string . "," . $lng_string;
            
            $latlngList = array($latlngList);
            $key = config("services.google-map.apikey");
            $keyword = $janl;
            $arr1 = [];
            
            foreach($latlngList as $latlng){
                $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latlng.'&radius=10000&language=ja&keyword='.$keyword.'&key='.$key;
                $data = json_decode(@file_get_contents($url), true);
                foreach($data["results"] as $info){
                    $lat = $info["geometry"]["location"]["lat"]; //対象施設の緯度
                    $lng = $info["geometry"]["location"]["lng"]; //対象施設の経度
                    $name = $info["name"]; //対象施設の名前
                    array_push($arr1, [$lat,$lng,$name]);
                }
            }
            
            return view('/category')->with(['arr1' => $arr1, 'janl' => $janl, 'lat' => $lat, 'lng' => $lng, 'curent_lat' => $curent_lat, 'curent_lng' => $curent_lng]);
        }
    
}
