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
    <form action="{{ route('showSpice') }}" method="POST" id="userForm">
        @csrf
            <div class="main">
                <div class="container">
                    <img class="image" src="{{asset('img/spice/Cumin.png')}}"></img>
                </div>
            </div>
            <button type="submit" class="btn_style1">戻る</button>
    </form>
</body>
</html>