<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>ログイン画面</title>
<body>
    <div class="flame1">
    <img class="image" src="{{asset('img/spiceCurryLogin.jpg')}}"></img>
        <div class="flame2">
    <li class="title" >ログイン</li>
    <form action="{{ route('login') }}" method="POST" id="userForm">
    @csrf
        <div class="login_content">
            <tr>
                @if (session('loginError'))
                <div class="text_type">
                    {{ session('loginError')}}
                </div>
                @endif

                @if (session('logout'))
                <div class="text_type">
                    {{ session('logout')}}
                </div>
                @endif
                <td>ログインID:</td>
                    @if ($errors->has('email'))
                        <li>{{$errors->first('email')}}</li>
                    @endif
                <td>
                    <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{ old('email') }}">
                </td>
            </tr>
            <tr>
                <td>パスワード:</td>
                    @if ($errors->has('password'))
                        <li>{{$errors->first('password')}}</li>
                    @endif
                <td>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" >
                </td>
            </tr>
            <div class="btn_content">
                <button type="submit" class="btn">ログイン</button>
                <a href="{{ route('showAccount') }}">新規ユーザー登録はこちら</a>
            </div>
        </div>
    </form>
    </div>
    </div>
</body>
</html>