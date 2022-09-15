
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
        <h>{{$janl}}</h>
        <div id="sample" style="height:500px"></div>
        <div class="back">[<a href="/">back</a>]</div>
    <script>
        window.Laravel = {};
        window.Laravel.name = @json($arr1);
        
        window.lat = {};
        window.lat.name = @json($lat);
        
        window.lng = {};
        window.lng.name = @json($lng);
    </script>
    <script src="{{ asset('js/sample.js') }}"></script>//
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=APIキー&callback=initMap" async defer>
    </script>
    </body>
</html>　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
