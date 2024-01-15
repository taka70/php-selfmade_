<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>cafe-cafe</title>
</head>
<body>
@section('header')
    <header1 id="motion" class="motion" >
        <div >
            <div class="header_style"> 
                <div class="g_nav">
                    <div class="menu_click">
                        <a href="{{ route('showTopPage') }}">Home</a>
                    </div>
                    <div class="menu_click">
                        <a href="{{ route('showStore') }}">店舗</a>
                    </div>
                    <div class="menu_click">
                        <a href="{{ route('showProduct') }}">商品</a>
                    </div>
                    <div class="menu_click">
                        <a href="{{ route('showSpice') }}">スパイス</a>
                    </div>
                </div>
                <div class="logout_click">
                    <form class="btn_content"action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn_logout">ログアウト</button>
                    </form>
                </div>
            </div>
        </div>
    </header1><!-- header -->    
    @endsection
</body>
</html>