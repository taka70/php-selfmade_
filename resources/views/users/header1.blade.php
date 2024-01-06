<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>cafe-cafe</title>
</head>
<body>
@section('header1')
    <header1 id="motion" class="motion" >
        <div >
            <div class="header_style"> 
                <div class="g_nav">
                    <div class="menu_click">
                        <a href="{{ route('showLogin') }}">Login</a>
                    </div>
                    <div class="menu_click">
                        <a href="{{ route('showAccount') }}">新規ユーザー登録</a>
                    </div>
                </div>
            </div>
        </div>
    </header1><!-- header -->    
    @endsection
</body>
</html>