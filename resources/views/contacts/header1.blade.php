<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<title>cafe-cafe</title>
</head>
<body>
@section('header')
    <header class="motion1">
    <div>
        <div class="header_style"> 
                <div>
                    <a href="{{ route('showTopPage') }}">
                        <img class="header_photo" src="{{ asset('img/logo.png') }}">
                    </a>
                </div>
                <div class="g_nav">
                    <div class="menu_click">
                        <a href="{{ route('showTopPage')}}#cafe_intro">はじめに</a>
                    </div>
                    <div class="menu_click">
                        <a href="{{ route('showTopPage')}}#background_black">体験</a>
                    </div>
                    <div class="menu_click">
                        <a href="{{ route('showContact') }}">お問い合わせ</a>
                    </div>
                </div>
                <nav>
                    <a id="click_sign" class="click_sign">サインイン</a>
                </nav>
                <button class="sns_button2" name="menu">  
                    <img class="sns2" src="{{asset('img/menu.png')}}"></img>
                </button>  
            </div>
        </div>
        <div id="login" class="login2" >
            <dd class="sns_bgcolor">
                <nav class="menu_tag">
                    <a id="click_sign" class="click_sign2">サインイン</a>
                    <li class="menu_click4" >
                        <a style="color: black;" href="{{ route('showTopPage')}}#cafe_intro">はじめに</a>
                    </li>                   
                    <li class="menu_click5">
                        <a style="color: black;" href="{{ route('showTopPage')}}#background_black">体験</a>
                    </li>
                    <li class="menu_click3" >
                        <a style="color: black;" href="{{ route('showContact') }}">お問い合わせ</a>
                    </li>
                </nav>
            </dd>
        </div>
        <div id="login" class="login" >
            <open-modal>
                <div id="overlay" class="overlay">
                    <div id="signin_box">
                        <h2>ログイン</h2>
                        <form action action="{{ route('showTopPage') }}" method="get">
                        @csrf 
                            <dl>
                                <dd>
                                    <input type="text" name="name" placeholder="メールアドレス">
                                </dd>
                                <dd>
                                    <input type="text" name="pass" placeholder="パスワード">
                                </dd>
                                <dd>
                                    <button class="button" type="submit">送信</button>
                                </dd>
                            </dl>
                            <dl>
                                <dd class="sns_bgcolor">
                                    <button class="sns_button" name="twitter">
                                        <img class="sns" src="{{asset('img/twitter.png')}}"></img>
                                    </button>
                                </dd>
                                <dd class="sns_bgcolor">
                                    <button class="sns_button" name="facebook">
                                        <img class="sns" src="{{asset('img/fb.png')}}"></img>
                                    </button>
                                </dd>
                                <dd class="sns_bgcolor">
                                    <button class="sns_button" name="google">
                                        <img class="sns" src="{{asset('img/google.png')}}"></img>
                                    </button>
                                </dd>
                                <dd class="sns_bgcolor">
                                    <button class="sns_button" name="apple">
                                        <img class="sns" src="{{asset('img/apple.png')}}"></img>
                                    </button>
                                </dd>
                            </dl>
                        </form>
                    </div>
                </div>
            </open-modal>
        </div>
    </header><!-- header -->    
@endsection
</body>
</html>