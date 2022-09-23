
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <div class = "resultpage" style="text-align: center">
        <h1>おすすめのご飯は・・・「{{$janl}}」です！！</h1>
        <div id="sample" style="width: 500px; height:500px; text-align: center"></div>
        <div class="back">[<a href="/">やっぱり決め直したい</a>]</div>
        <div id="results" style="width: 50%; height: 200px; border: 1px dotted; padding: 10px; overflow-y: scroll; background: white;"></div>
        </div>
            <script>
            window.Laravel = {};
            window.Laravel.name = @json($arr1);
            
            window.lat = {};
            window.lat.name = @json($curent_lat_float);
            
            window.lng = {};
            window.lng.name = @json($curent_lng_float);
        </script>
        <script src="{{ asset('js/sample.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config("services.google-map.apikey") }}&callback=initMap" async defer>
        </script>
　　　　    @endsection　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
