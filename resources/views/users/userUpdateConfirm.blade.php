<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>ユーザー変更情報内容</title>
<head>
</head>
<body>
    @include('Top.header')
    @yield('header')
        <div class="contact_box">
        <h2>ユーザー変更情報内容</h2>
        <form action="{{ route('showUserUpdateComplete', $id) }}" method="POST">
        @csrf
            <p>下記のユーザー変更情報内容をご確認の上、問題なければ登録ボタンを押してください。</p>
            <p>内容を訂正する場合は戻るを押してください。</p>
            <dl class="confirm">
                <dt>ユーザーID</dt>
                {{ $inputs['email'] }}
                <input name="email" value="{{ $inputs['email'] }}" type="hidden">
                <dt>ユーザー名</dt>
                {{ $inputs['name'] }}
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                <dt>フリガナ</dt>
                {{ $inputs['kana'] }}
                <input name="kana" value="{{ $inputs['kana'] }}" type="hidden">
                <dt>Password</dt>
                <dd>{{ str_repeat('*', strlen($inputs['password'])) }}</dd>
                <input name="password" value="{{ $inputs['password'] }}" type="hidden">
                <dt>ユーザー区分</dt>
                <dd>
                    <span>        
                        @if ($user->role == 0)
                            管理ユーザー
                        @elseif ($user->role == 1)
                            一般ユーザー
                        @elseif ($user->role == 2)
                            店舗スタッフ
                        @else
                            未知のユーザー区分
                        @endif
                    </span>
                </dd>
                <dt>電話番号</dt>
                {{ $inputs['tel'] }}
                <input name="tel" value="{{ $inputs['tel'] }}" type="hidden">
                <dd class="confirm_btn">
                    <button type="submit" name="back" value="back" style="background-color: lightblue; margin-left: 10px;">戻る</button>
                    <button type="submit" class="btn_style1">登録</button>
                </dd>
            </dl>
        </form>
<script src="{{ asset('js/index1.js') }}"></script>
</body>
</html>
