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
        <form action="{{ route('showStoreComplete') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <p>下記の店舗登録情報をご確認の上送信ボタンを押してください。</p>
            <p>内容を訂正する場合は戻るを押してください。</p>
            <dl class="confirm">
            <dt>店舗名</dt>
                <li>{{ $inputs['name'] }}</li>
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                <dt>郵便番号</dt>
                <li>{{ $inputs['postal_code'] }}</li>
                <input name="postal_code" value="{{ $inputs['postal_code'] }}" type="hidden">
                <dt>都道府県</dt>
                <li>{{ $prefectureName }}</li>
                <input name="prefecture_id" value="{{ $inputs['prefecture_id'] }}" type="hidden">
                <dt>住所1</dt>
                <li>{{ $inputs['address1'] }}</li>
                <input name="address1" value="{{ $inputs['address1'] }}" type="hidden">
                <dt>住所2（番地以下・建物名・階数）</dt>
                <li>{{ $inputs['address2'] }}</li>
                <input name="address2" value="{{ $inputs['address2'] }}" type="hidden">
                <dt>電話番号</dt>
                <li>{{ $inputs['tel'] }}</li>
                <input name="tel" value="{{ $inputs['tel'] }}" type="hidden">
                <dt>アップロード写真（※拡張子：jpeg,png,jpg,gif 登録可能）</dt>
                <dt class="content">
                    <img class="image3" src="{{ asset('storage/' . $inputs['photo']) }}" alt="Store Photo">
                <input name="photo" value="{{ $inputs['photo'] }}" type="hidden">
                </dt>
                <dd class="confirm_btn">
                    <button type="submit" name="back" value="back" style="background-color: lightblue; margin-left: 10px;">戻る</button>
                    <button type="submit" class="btn_style1">登録</button>
                </dd>
            </dl>
        </form>
</body>
</html>
