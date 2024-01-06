<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>スパイス一覧画面</title>
</head>
<body>
    @include('Top.header')
    @yield('header')
    <form action="{{ route('showProductDetail') }}" method="GET">
        @csrf
        <div class="main">
            <div class="container">
                <img class="image3" src="{{asset('img/product/spicyCurry.png')}}"></img>
            </div>
            <div class="container">
                <img class="image3" src="{{asset('img/product/gyusujiCurry.png')}}"></img>
            </div>
            <div class="container">
                <img class="image3" src="{{asset('img/product/genban.png')}}"></img>
            </div>
        </div>
        <dd class="submit">
            <button type="submit" class="submit">詳細</button>
        </dd>
    </form>
</body>
</html>