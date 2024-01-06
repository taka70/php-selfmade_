<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>店舗登録情報確認画面</title>
    <style>
/* 
        .li {
            margin-top: 20px;
        }

        .table {
            margin-left: 10px;
            
        }

        .account_content {
            display: flex;
            flex-direction: column;
            width:40%;
            margin-left: 20px;
        } */
    </style>
<head>
</head>
<body>
    @include('Top.header')
    @yield('header')
        <div class="contact_box">
        <h2>店舗登録情報確認</h2>
        <form action="{{ route('showStoreComplete') }}" method="POST">
        @csrf
            <p>下記の店舗登録情報をご確認の上送信ボタンを押してください。</p>
            <p>内容を訂正する場合は戻るを押してください。</p>
            <dl class="confirm">
            <dt>店舗名</dt>
                {{ $inputs['name'] }}
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                <dt>郵便番号</dt>
                {{ $inputs['postal_code'] }}
                <input name="postal_code" value="{{ $inputs['postal_code'] }}" type="hidden">
                <dt>都道府県</dt>
                {{ $inputs['prefecture'] }}
                <input name="prefecture" value="{{ $inputs['prefecture'] }}" type="hidden">
                <dt>住所1</dt>
                {{ $inputs['address1'] }}
                <input name="address1" value="{{ $inputs['address1'] }}" type="hidden">
                <dt>住所2（番地以下・建物名・階数）</dt>
                {{ $inputs['address2'] }}
                <input name="address2" value="{{ $inputs['address2'] }}" type="hidden">
                <dt>メールアドレス</dt>
                {{ $inputs['mail'] }}
                <input name="mail" value="{{ $inputs['mail'] }}" type="hidden">
                <dt>電話番号</dt>
                {{ $inputs['number'] }}
                <input name="number" value="{{ $inputs['number'] }}" type="hidden">
                <dt>アップロード写真</dt>
                {{ $inputs['file'] }}
                <input name="file" value="{{ $inputs['file'] }}" type="hidden">
                <dd class="confirm_btn">
                    <button type="submit" name="back" value="back" style="background-color: lightblue; margin-left: 10px;">戻る</button>
                    <button type="submit" class="btn_style1">登録</button>
                </dd>
            </dl>
        </form>
</body>
</html>
