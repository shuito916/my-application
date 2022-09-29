<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
        public function index()
    {
 
        $rg01Datas = [
            "op1" => "「ちょっといいもの食べたいな！」　　　（約3000円～）",
            "op2" => "「こだわりはないかな」　　　　　（約800円～2000円）",
            "op3" => "「今日はちょっと抑えめで、、」　　　　 （～約800円）"
        ];
        $rg01Checked = "op2";
        
        $rg02Datas = [
            "opt1" => "「めっちゃお腹すいた～！」　　　　　（空腹度：大）",
            "opt2" => "「そんなにがっつりはいらないかな～」（空腹度：中）",
            "opt3" => "「今日はあっさりで行こう！」　　　　（空腹度：小）"
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
                $genre = $cate1[$r];
            } elseif($radioGrp01 == $sentakusi[0][0] && $radioGrp02 == $sentakusi[1][1]) {
                $r = rand(0,count($cate2)-1);
                $genre = $cate2[$r];
            } elseif($radioGrp01 == $sentakusi[0][0] && $radioGrp02 == $sentakusi[1][2]) {
                $genre = $cate3;
            } elseif($radioGrp01 == $sentakusi[0][1] && $radioGrp02 == $sentakusi[1][0]) {
                $r = rand(0,count($cate4)-1);
                $genre = $cate4[$r];
            } elseif($radioGrp01 == $sentakusi[0][1] && $radioGrp02 == $sentakusi[1][1]) {
                $r = rand(0,count($cate5)-1);
                $genre = $cate5[$r];
            } elseif($radioGrp01 == $sentakusi[0][1] && $radioGrp02 == $sentakusi[1][2]) {
                $r = rand(0,count($cate6)-1);
                $genre = $cate6[$r];
            } elseif($radioGrp01 == $sentakusi[0][2] && $radioGrp02 == $sentakusi[1][0]) {
                $r = rand(0,count($cate7)-1);
                $genre = $cate7[$r];
            } elseif($radioGrp01 == $sentakusi[0][2] && $radioGrp02 == $sentakusi[1][1]) {
                $r = rand(0,count($cate8)-1);
                $genre = $cate8[$r];
            } elseif($radioGrp01 == $sentakusi[0][2] && $radioGrp02 == $sentakusi[1][2]) {
                $genre = $cate9;
            } 
            
            
            $curent_lat = $request->lat;
            $curent_lng = $request->lng;
            
            $curent_lat_float = (float)$curent_lat;
            $curent_lng_float = (float)$curent_lng;
            
            $curent_lat_string = (string)$curent_lat;
            $curent_lng_string = (string)$curent_lng;
            
            $latlngList = $curent_lat_string . "," . $curent_lng_string;
            
            $latlngList = array($latlngList);
            $key = config("services.google-map.apikey");
            $keyword = $genre;
            
            $arr1 = [];
            
            foreach($latlngList as $latlng){
                $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latlng.'&radius=5000&language=ja&keyword='.$keyword.'&key='.$key;
                $data = json_decode(@file_get_contents($url), true);
                foreach($data["results"] as $info){
                    $lat = $info["geometry"]["location"]["lat"]; //対象施設の緯度
                    $lng = $info["geometry"]["location"]["lng"]; //対象施設の経度
                    $name = $info["name"]; //対象施設の名前
                    $rating = $info["rating"]; //口コミ点数
                    array_push($arr1, [$lat,$lng,$name,$rating]);
                }
            }
            

            
            
            return view('/category')->with([
                'arr1' => $arr1,
                'genre' => $genre,
                'curent_lat_float' => $curent_lat_float,
                'curent_lng_float' => $curent_lng_float]);
        }
    
}