<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>スパイス詳細画面</title>
</head>
<body>
    @include('Top.header')
    @yield('header')        
        @if(isset($spice))
        <div class="main2">
                    <div class="container5">  
                        <div class="content12">
                            <div class="content7">{{ $spice->name }}</div>
                            <div class="content7">効果：{{ $spice->effect }}</div> 
                        </div>
                        <div class="content">
                            <img class="image7" src="{{asset($spice->photo)}}"></img>
                        </div>   
                    </div>
                    <div class="content13">
                        <div class="content8">科目：{{ $spice->subject }}</div>
                        <div class="content8">原産地：{{ $spice->habitat }}</div>
                        <div class="content8">部位：{{ $spice->part }}</div>
                        <div class="content8">別名：{{ $spice->alias }}</div>
                        <div class="content8">特徴：{{ $spice->characteristic }}</div>
                    </div>
                </div>
            <div class="content4">
                <a  href="{{ route('showSpice') }}" class="back-link">戻る</a>
            </div>
        @endif
</body>
</html>