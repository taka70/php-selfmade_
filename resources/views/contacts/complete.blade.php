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
            <h2>お問い合わせ</h2>
            <div class="complete_msg">
                <p>お問い合わせ頂きありがとうございます。</p>
                <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                <a href="{{ route('showTopPage')}}" class="submit">トップページへ戻る</a>
            </div>
        </div>
    </section>
    @include('Top.footer')
@yield('footer')
<script src="{{ asset('js/index1.js') }}"></script>
</body>
</html>
