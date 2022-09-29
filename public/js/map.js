var map;
var marker = [];
var infoWindow = [];
var markerData = [];
var current = {};


current.name = "現在位置";
current.lat = lat.name;
current.lng = lng.name;
markerData.push(current);

for (var i = 0; i < data.name.length; i++) {
  var current = {};
  current.name = data.name[i][2];
  current.lat = data.name[i][0];
  current.lng = data.name[i][1];
  current.rating = data.name[i][3];
  markerData.push(current);
    
}

console.log(markerData);
 
function initMap() {
 // 地図の作成
    var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
    map = new google.maps.Map(document.getElementById('map'), { // #sampleに地図を埋め込む
        center: mapLatLng, // 地図の中心を指定
        zoom: 13 // 地図のズームを指定
    });
 
 // マーカー毎の処理
    for (var i = 0; i < markerData.length; i++) {
        markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
         position: markerLatLng, // マーカーを立てる位置を指定
            map: map, // マーカーを立てる地図を指定
            animation: google.maps.Animation.DROP
        });
 
    infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
        content: '<div class="map">' + markerData[i]['name'] + '</div>' // 吹き出しに表示する内容
    });
 
     markerEvent(i); // マーカーにクリックイベントを追加
     
    }


    marker[0].setOptions({// 現在位置のマーカーのオプション設定
        icon: {
            fillColor: "#1e90ff",                //塗り潰し色
    		fillOpacity: 0.9,                    //塗り潰し透過率
    		path: google.maps.SymbolPath.CIRCLE, //円を指定
    		scale: 14,                           //円のサイズ
    		strokeColor: "#ffffff",              //枠の色
    		strokeWeight: 1.0      
       }
    });
    results();
}
 
// マーカーにクリックイベントを追加
function markerEvent(i) {
    marker[i].addListener('click', function() { // マーカーをクリックしたとき
      infoWindow[i].open(map, marker[i]); // 吹き出しの表示
  });
}

function results(){
      var resultHTML = "<ol>";
      
      for (var i = 1; i < data.name.length; i++) {
        
        //ratingがないのものは「---」に表示変更
        var rating = data.name[i][3];
        if(rating == 0) rating = "---";
        
        //表示内容（評価＋名称）
        var content = "【" + rating + "】 " + data.name[i][2];
        
        resultHTML += "<li>";
        resultHTML += content;
        resultHTML += "</li>";
      }
      
      resultHTML += "</ol>";
      
      //結果表示
      document.getElementById("results").innerHTML = resultHTML;
    }

// function ranking(){
//     //結果表示
//     var resultHTML ="<ol>"+"<li>"+"hogehoge"+"</li>"+"</ol>";
//     console.log(resultHTML);
//     document.getElementById("results").innerHTML = resultHTML;
// }