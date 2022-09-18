
 　<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body style="background:url({{ asset('images/image05.png') }}); 
background-size:cover;">
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　
        @section('content')
        <div class = "applicationname" style="text-align: center">
        <h1>外食に迷ったら！</h1>
        </div>
        <div class = "title" style="text-align: center">
        <h2>気分と予算を選択しよう！</h2>
        </div>
        
        <form action="/category" method="POST">
            @csrf
        <div class="form-group row">
            <label for="radioGrp02" class="col-md-4 col-form-label text-md-right">お腹の調子</label>
            <div class="col-md-6">
                @foreach($rg02Datas as $r2key => $r2val)
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="radioGrp02" name="radioGrp02" value="{{$r2key}}"
                        @if(empty(old()) and $r2key == $rg02Checked) checked="checked"
                        @elseif($r2key == old('radioGrp02'))) checked="checked"
                        @endif
                    >
                    <label class="form-check-label" for="{{$r2key}}">{{$r2val}}</label>
      　         </div>
                @endforeach
            </div>
        </div>
        
        <div class="form-group row">
            <label for="radioGrp01" class="col-md-4 col-form-label text-md-right">予算</label>
            <div class="col-md-6">
                @foreach($rg01Datas as $r1key => $r1val)
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="radioGrp01" name="radioGrp01" value="{{$r1key}}"
                        @if(empty(old()) and $r1key == $rg01Checked) checked="checked"
                        @elseif($r1key == old('radioGrp02'))) checked="checked"
                        @endif
                    >
                    <label class="form-check-label" for="{{$r1key}}">{{$r1val}}</label>
      　         </div>
                @endforeach
            </div>
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
