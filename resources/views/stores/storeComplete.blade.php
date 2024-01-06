<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>店舗登録完了</title>
</head>
<body>
    @include('Top.header')
    @yield('header')
    <section>
        <div class="contact_box">
            <h2>店舗登録完了</h2>
            <div class="complete_msg">
                <p>問題なく店舗登録が完了しました。</p>
                <a href="{{ route('showTopPage')}}" class="submit">Topへ戻る</a>
            </div>
        </div>
    </section>
</body>
</html>
