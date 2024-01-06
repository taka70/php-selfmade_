<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<title>cafe-cafe</title>
</head>

<body>
@include('contacts.header1')
    @yield('header')
    <section>
        <div class="contact_box">
            <h2 style=background-color:coral;>お問い合わせ内容の編集</h2>
            <div class="complete_msg">
                <p>お問い合わせ内容の編集完了しました。</p>
                <a href="{{ route('showTopPage')}}" class="submit">トップページへ戻る</a>
            </div>
        </div>
    </section>
    @include('Top.footer')
@yield('footer')
<script src="{{ asset('js/index1.js') }}"></script>
</body>
</html>