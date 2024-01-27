<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
          <a href="{{ route('showFavorite', ['id' => auth()->id()]) }}">Favorite</a>
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
            <a href="{{ route('showFavorite', ['id' => auth()->id()]) }}">Favorite</a>
        </ul>
    </nav>
</body>
<script>
    //ハンバーガーボタンをクリックした時の処理を定義
    document.querySelector(".menu-btn").addEventListener("click", function() {
    // class="nav-02"の要素を取得
    var navElement = document.querySelector(".nav-02");

    // leftプロパティの値を取得
    var leftValue = parseInt(getComputedStyle(navElement).left);

    // leftプロパティを切り替える
    if (leftValue === 0) {
        navElement.style.left = "-40%";
    } else {
        navElement.style.left = "0%";
    }
    });
</script>
</html>