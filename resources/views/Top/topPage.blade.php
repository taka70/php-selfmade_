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
                @if (session('loginSuccess'))
                    <div class="alert alert-success">
                        {{ session('loginSuccess')}}
                    </div>
                @endif
        <div style="display: flex; padding: 20px;">
            <div style="width: 80%;">
                <h2 class="mv__copy__en"><span style="translate: none; rotate: none; scale: none; transform: translate(0%, 21.9298%) translate3d(0px, 0px, 0px);">
                    <img class="image5" src="{{asset('img/text_copy.acac4d21.webp')}}" alt="Spice up your life" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);"></span>
                </h2>
                <p class="mv__copy__ja" style="opacity: 0.7807;">
                    <span style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); font-size: 200%;">人生にアイデアとスパイスを。</span>
                </p>    
            </div>
            <div class="container2">
                <div class="content6">
                    <li>名前： {{ Auth::user()->name }}</li>
                    <li>Email: {{ Auth::user()->email }}</li>
                    <dd>
                    <span>        
                        @if ($user->role == 0)
                        区分:管理ユーザー
                        @elseif ($user->role == 1)
                        区分:一般ユーザー
                        @elseif ($user->role == 2)
                        区分:店舗スタッフ
                        @else
                        区分:未知のユーザー区分
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="container1">
                <img class="image2" src="{{asset('img/spiceCurryTop.jpg')}}"></img>
            </div>
            <div>
                <div>
                    <div class="mv_news1 fadeIn-right" style="opacity: 0.8009; translate: none; rotate: none; scale: none;">
                        <a href="{{ route('showStore') }}" class="mv__news__link">
                            <div class="mv__news__head">
                                <div class="mv__news__date" >Store</div>
                            </div>
                            <div class="mv__news__body">
                                <h3 class="mv__news__title">店舗一覧</h3>
                            </div>
                        </a>
                    </div>
                    <div class="mv_news2 fadeIn-right" style="opacity: 0.8009; translate: none; rotate: none; scale: none;">
                        <a href="{{ route('showProduct') }}" class="mv__news__link">
                            <div class="mv__news__head">
                                <div class="mv__news__date" >Product</div>
                            </div>
                            <div class="mv__news__body">
                                <h3 class="mv__news__title">商品一覧</h3>
                            </div>
                        </a>
                    </div>
                    <div class="mv_news3 fadeIn-right" style="opacity: 0.8009; translate: none; rotate: none; scale: none;">
                        <a href="{{ route('showSpice') }}" class="mv__news__link">
                            <div class="mv__news__head">
                                <div class="mv__news__date" >Spice</div>
                            </div>
                            <div class="mv__news__body">
                                <h3 class="mv__news__title">スパイス一覧</h3>
                            </div>
                        </a>
                    </div>
                </div> 
                <div>
                    <div class="c-headline js-maskRise" style="translate: none; rotate: none; scale: none; clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%); transform: translate(0px, 0px);">
                        <span class="c-headline_en">Menu</span>
                        <h2 class="c-headline_ja"></h2>
                    </div>
                    <div class="container4">
                        <div class="content">
                            <a href="{{ route('showStoreRegister') }}">店舗登録</a>
                        </div>
                        <div class="content">
                            <a href="{{ route('showDishRegister') }}">店舗Menu登録</a>
                        </div>
                        <div class="content">
                            <a href="{{ route('showUserUpdate', ['id' => $user->id]) }}">ユーザー情報変更</a>
                        </div>
                        <div class="content">
                            <a href="{{ route('showUserIndex') }}">ユーザー管理</a>
                        </div>
                    </div>  
                </div> 
            </div>      
        </div>
                <!-- <div class="mv_copy" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                    <h2 class="mv__copy__en"><span style="translate: none; rotate: none; scale: none; transform: translate(0%, 21.9298%) translate3d(0px, 0px, 0px);">
                        <img class="image5" src="{{asset('img/text_copy.acac4d21.webp')}}" alt="Spice up your life" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);"></span>
                    </h2>
                    <p class="mv__copy__ja" style="opacity: 0.7807;">
                        <span style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">人生にアイデアとスパイスを。</span>
                    </p>
                </div> -->



                <!-- <div class="c-grids">
                    <li class="c-grid js-parallax">
                        <a href="{{ route('showStore') }}" class="c-link">
                            <div class="c-link_bg"></div>
                            <div class="c-link_bg2"></div>
                            <div class="c-link_h"><span class="c-link__h__en">Store</span>
                                <span class="c-link_h_ja">店舗</span>
                            </div>
                        </a>
                    </li>
                    <li class="c-grid js-parallax">
                        <a href="{{ route('showProduct') }}" class="c-link">
                            <div class="c-link_bg"></div>
                            <div class="c-link_bg2"></div>
                            <div class="c-link_h"><span class="c-link__h__en">Product</span>
                                <span class="c-link_h_ja">商品</span>
                            </div>
                        </a>
                    </li>
                    <li class="c-grid js-parallax">
                        <a href="{{ route('showSpice') }}">
                            <div class="c-link_bg"></div>
                            <div class="c-link_bg2"></div>
                            <div class="c-link_h"><span class="c-link__h__en">Spice</span>
                                <span class="c-link_h_ja">スパイス一覧</span>
                            </div>
                        </a>
                    </li>
                </div> -->


                <!-- <div class="container2">
                    <div class="content6">
                    <li>名前： {{ Auth::user()->name }}</li>
                    <li>Email: {{ Auth::user()->email }}</li>
                    <dd>
                    <span>        
                        @if ($user->role == 0)
                        区分:管理ユーザー
                        @elseif ($user->role == 1)
                        区分:一般ユーザー
                        @elseif ($user->role == 2)
                        区分:店舗スタッフ
                        @else
                        区分:未知のユーザー区分
                        @endif
                    </span>
                </dd> -->

</body>
<script>
  // 左からスライドインさせるためスクロールで表示したい要素設定
  const fadeInRight = document.querySelectorAll(".fadeIn-right");
  // IntersectionObserverのオプションを設定
  const options5 = {
    rootMargin: '0px',
    threshold: 0.3,
  };

  // IntersectionObserverを実行
  const observer1 = new IntersectionObserver(showElementRight,options5);
  
  // fadeInクラスが付与されてる要素にたどり着いたら実行
  fadeInRight.forEach((fadeInRight) => {
  observer1.observe(fadeInRight);
  });
  
  // 要素が表示されたら実行する動作
  function showElementRight(entries1) {
    entries1.forEach((entry) => {
      if (entry.isIntersecting) {
      // 要素にactiveクラスを付与
      entry.target.classList.add("active");
      } else {
      // 要素から画面から抜けたらactiveクラスを削除
      entry.target.classList.remove("active");
      }
    });
  }

  //ハンバーガーボタンをクリックした時の処理を定義
document.querySelector(".menu-btn").addEventListener("click", function() {
  // class="nav-02"の要素を取得
  var navElement = document.querySelector(".nav-02");

  // rightプロパティの値を取得
  var rightValue = parseInt(getComputedStyle(navElement).right);

  // rightプロパティを切り替える
  if (rightValue === 0) {
    navElement.style.right = "-40%";
  } else {
    navElement.style.right = "0%";
  }
});

</script>
</html>