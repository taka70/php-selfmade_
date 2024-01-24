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
<header class="fade-in-first fade-in-from-up fade-in-active02">
    <div class="header-container">
      <div>
        <nav>
          <a href="{{ route('showTopPage') }}">Home</a>
          <a href="{{ route('showStore') }}">Store</a>
          <a href="{{ route('showProduct') }}">Product</a>
          <a href="{{ route('showSpice') }}">Spice</a>
        </nav>

        <!-- チェックボックス -->
        <input type="checkbox" id="open">
        <!-- ボタン -->
        <label for="open" class="menu-btn">
            <span class="top-bar"></span> <!--上の線-->
            <span class="center-bar"></span> <!--中の線-->
            <span class="under-bar"></span> <!--下の線-->
        </label>
        </div>
        <div>
            <div class="logout_click">
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                    <button class="btn_logout">ログアウト</button>
                </form>
            </div>               
        </div>
    </div><!-- header-container -->
</header><!-- header -->
    <nav class="nav-02 nav-02-active">
        <ul class="=link">
            <a href="{{ route('showTopPage') }}">Home</a>
            <a href="{{ route('showStore') }}">Store</a>
            <a href="{{ route('showProduct') }}">Product</a>
            <a href="{{ route('showSpice') }}">Spice</a>
        </ul>
    </nav>
    </div>


    <!-- <header1 id="motion" class="motion" >
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
    </header1>-->
    @endsection
</body>
</html>