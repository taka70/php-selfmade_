<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>TOP画面</title>
</head>
<body>
    @include('Top.header')
    @yield('header')
    <form action="{{ route('showSpice') }}" method="POST" id="userForm">
        @csrf
            <div class="main">
                <div class="container1">
                    <img class="image2" src="{{asset('img/spiceCurryTop.jpg')}}"></img>
                </div>
                <div class="container2">
                    <div class="container3">
                        <div class="content">
                            <a href="{{ route('showProduct') }}">商品一覧</a>
                        </div>
                        <div class="content">
                            <a href="{{ route('showStore') }}">店舗一覧</a>
                        </div>
                        <div class="content">
                            <a href="{{ route('showSpice') }}">スパイス一覧</a>
                        </div>
                        <div class="content">
                            <a>お気に入り</a>
                        </div>
                    </div>
                    <div class="container4">
                        <div class="content">
                            <a>ユーザー情報編集</a>
                        </div>
                        <div class="content">
                            <a href="{{ route('showStoreRegister') }}">店舗登録</a>
                        </div>
                        <div class="content">
                            <a>商品Menu登録</a>
                        </div>
                    </div>
                </div>
    </form>
</body>
</html>