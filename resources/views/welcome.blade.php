@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
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
        <div id="sample" style="height:500px"></div>
    <script>
        window.Laravel = {};
        window.Laravel.name = @json($arr1);
    </script>
    <script src="{{ asset('js/sample.js') }}"></script>//
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=APIキー&callback=initMap" async defer>
    </script>
    </body>
</html>
@endsection