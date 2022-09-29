    <title>料理ジャンル</title>
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <h1><span class="midasi">おすすめのご飯は・・・</span>「<span class="genre">{{$genre}}</span>」です！！</h1>
        <div class="googlemap" id="map" style=" height:400px; margin: auto"></div>
        <div class="kuchikomi" style="margin-top:30px; text-align: center"><h2>口コミ点数ランキング</h2></div>
        <div class="kuchikomi_resurts" id="results" style="width: 30%; height: 200px; border: 1px dotted; padding: 10px; overflow-y: scroll; background: white; margin: auto"></div>
        <div class="back" style="margin-left:50px; text-align: center">[<a href="/">やっぱり料理ジャンルを決め直したい</a>]</div>
        <script>
            window.data = {};
            window.data.name = @json($arr1);
            
            window.lat = {};
            window.lat.name = @json($curent_lat_float);
            
            window.lng = {};
            window.lng.name = @json($curent_lng_float);
        </script>
        <script src="{{ asset('js/map.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config("services.google-map.apikey") }}&callback=initMap" async defer>
        </script>
　　@endsection　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
