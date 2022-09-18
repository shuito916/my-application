
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <h1>おすすめのご飯は・・・「{{$janl}}」です！！</h1>
        <div id="sample" style="height:500px"></div>
        <div class="back">[<a href="/">やっぱり決め直したい</a>]</div>

            <script>
            window.Laravel = {};
            window.Laravel.name = @json($arr1);
            
            window.lat = {};
            window.lat.name = @json($curent_lat);
            
            window.lng = {};
            window.lng.name = @json($curent_lng);
        </script>
        <script src="{{ asset('js/sample.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config("services.google-map.apikey") }}&callback=initMap" async defer>
        </script>
　　　　    @endsection　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
