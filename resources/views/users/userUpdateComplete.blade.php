<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>ユーザー情報編集完了</title>
</head>
<body>
    @include('Top.header')
    @yield('header')
    <section>
        <div class="contact_box">
            <h2>ユーザー情報編集完了</h2>
            <div class="complete_msg">
                <p>問題なくユーザー情報編集が完了しました。</p>
                <a href="{{ route('showTopPage')}}" class="submit">ログインページへ戻る</a>
            </div>
        </div>
    </section>
</body>
</html>
