<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>ユーザー情報変更完了</title>
</head>
<body>
    @include('Top.header')
    @yield('header')
    <section>
        <div class="contact_box">
            <h2>ユーザー情報変更完了</h2>
            <div class="complete_msg">
                <p>問題なくユーザー情報が変更しました。</p>
                <a href="{{ route('showTopPage')}}" class="submit">Homeへ戻る</a>
            </div>
        </div>
    </section>
</body>
</html>
