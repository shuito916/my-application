
 　<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>料理ジャンル</title>

        <link rel="stylesheet" href="{{ asset('css/top.css') }}">
        <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　
        @section('content')
        <div class = "applicationname" style="text-align: center">
        <h1>外食に迷ったら！</h1>
        </div>
        <div class = "title" style="text-align: center">
        <h2>気分と予算を選択して料理ジャンルを決めよう！</h2>
        </div>
        
        <form class="form" action="/category" method="POST">
            @csrf
        <div class="form-group1">
            <fieldset>
            <legend class="form-title1">おなかの調子</legend>
            <div class="col-md-6" style="margin: auto">
                @foreach($rg02Datas as $r2key => $r2val)
                <div class="form-check1" style="width:430px">
                    <input class="form-check-input" type="radio" id="radioGrp02" name="radioGrp02" value="{{$r2key}}"
                        @if(empty(old()) and $r2key == $rg02Checked) checked="checked"
                        @elseif($r2key == old('radioGrp02'))) checked="checked"
                        @endif
                    >
                    <label class="form-check-label" for="{{$r2key}}">{{$r2val}}</label>
      　         </div>
                @endforeach
            </div>
            </fieldset>
        </div>
        
        <div class="form-group2">
            <fieldset>
            <legend class="form-title2">予算</legend>
            <div class="col-md-6" style="margin: auto;">
                @foreach($rg01Datas as $r1key => $r1val)
                <div class="form-check2" style="width:450px">
                    <input class="form-check-input" type="radio" id="radioGrp01" name="radioGrp01" value="{{$r1key}}"
                        @if(empty(old()) and $r1key == $rg01Checked) checked="checked"
                        @elseif($r1key == old('radioGrp02'))) checked="checked"
                        @endif
                    >
                    <label class="form-check-label" for="{{$r1key}}">{{$r1val}}</label>
      　         </div>
                @endforeach
            </div>
            </fieldset>
        </div>
        <div class = "bottun" style="text-align: center">
        <input type="submit" value="あなたに今おすすめのご飯は…"/>
        </div>
        <input type="hidden" name="lat" value="" >
        <input type="hidden" name="lng" value="" >
        </form>
        <script src="{{ asset('js/test.js') }}"></script>
        @endsection
    </body>
</html>　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
