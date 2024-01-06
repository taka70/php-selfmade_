<?php
// dd($id);
?>
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
        <div class="contact_box">
        <h2 style=background-color:coral;>お問い合わせ内容の編集</h2>
        <form id="myForm" action="{{ route('register', $id) }}" method="POST" >
        @csrf
            <p>下記の内容をご確認の上送信ボタンを押してください。</p>
            <p>内容を訂正する場合は戻るを押してください。</p>
            <dl class="confirm">
                <dt>氏名</dt>
                {{ $inputs['name'] }}
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                <dt>フリガナ</dt>
                {{ $inputs['kana'] }}
                <input name="kana" value="{{ $inputs['kana'] }}" type="hidden">
                <dt>電話番号</dt>
                {{ $inputs['number'] }}
                <input name="number" value="{{ $inputs['number'] }}" type="hidden">
                <dt>メールアドレス</dt>
                {{ $inputs['mail'] }}
                <input name="mail" value="{{ $inputs['mail'] }}" type="hidden">
                <dt>お問合せ内容</dt>
                {!! nl2br(e($inputs['body'])) !!}
                <input name="body" value="{{ $inputs['body'] }}" type="hidden">
                <dd class="confirm_btn">
                    <button type="submit" class="submit">送信</button>
                    <button type="submit" name="back" value="back" style="background-color: lightblue; margin-left: 10px;">戻る</button>
                </dd>
            </dl>
        </form>
    @include('Top.footer')
@yield('footer')
<script src="{{ asset('js/index1.js') }}"></script>
</body>
</html>