function setLocation(pos) {
  // 緯度・経度を取得
  const lat = pos.coords.latitude;
  const lng = pos.coords.longitude;
  // 定数lat,lng をconsoleに出力
  console.log(lat);
  console.log(lng);
}
// エラー時に呼び出される関数
function showErr(err) {
  switch (err.code) {
      case 1 :
          alert("位置情報の利用が許可されていません");
          break;
      case 2 :
          alert("デバイスの位置が判定できません");
          break;
      case 3 :
          alert("タイムアウトしました");
          break;
      default :
          alert(err.message);
  }
}
// geolocation に対応しているか否かを確認
if ("geolocation" in navigator) {
  var opt = {
      "enableHighAccuracy": true,
      "timeout": 10000,
      "maximumAge": 0,
  };
  navigator.geolocation.getCurrentPosition(setLocation, showErr, opt);
} else {
  alert("ブラウザが位置情報取得に対応していません");
}
var lat_send = setLocation().lat;
var lng_send = setLocation().lng;

$.ajax({
  type: "POST", //　GETでも可
  url: "../../app/Http/Controllers/TopController.php", //　送り先
  data: { '': lat_send }, //　渡したいデータをオブジェクトで渡す
  dataType : "json", //　データ形式を指定
  scriptCharset: 'utf-8' //　文字コードを指定
})

$.ajax({
  type: "POST", //　GETでも可
  url: "./../../app/Http/Controllers/TopController.php", //　送り先
  data: { '': lng_send }, //　渡したいデータをオブジェクトで渡す
  dataType : "json", //　データ形式を指定
  scriptCharset: 'utf-8' //　文字コードを指定
})