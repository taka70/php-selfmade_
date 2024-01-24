<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>店舗Menu登録内容確認画面</title>
<head>
</head>
<body>
    @include('Top.header')
    @yield('header')
        <div class="contact_box">
        <h2>店舗Menu登録内容確認</h2>
        <form action="{{ route('showDishComplete') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <p>下記の店舗Menu登録内容をご確認の上、登録ボタンを押してください。</p>
            <p>内容を訂正する場合は戻るを押してください。</p>
            <dl class="confirm">
                <dt>料理名</dt>
                {{ $inputs['name'] }}
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                <dt>価格</dt>
                {{ $inputs['price'] }}
                <input name="price" value="{{ $inputs['price'] }}" type="hidden">
                <dt>発祥地</dt>
                {{ $inputs['country_id'] }}
                <input name="country_id" value="{{ $inputs['country_id'] }}" type="hidden">
                <dt>リーズナブル</dt>
                {{ $inputs['reasonable'] }}
                <input name="reasonable" value="{{ $inputs['reasonable'] }}" type="hidden">
                <dt>辛さ</dt>
                {{ $inputs['painfulness'] }}
                <input name="painfulness" value="{{ $inputs['painfulness'] }}" type="hidden">
                <dt>ローカルテイスト</dt>
                {{ $inputs['local_taste'] }}
                <input name="local_taste" value="{{ $inputs['local_taste'] }}" type="hidden">
                <dt>店舗名</dt>
                {{ $inputs['store_id'] }}
                <input name="store_id" value="{{ $inputs['store_id'] }}" type="hidden">
                <dt>料理説明</dt>
                {{ $inputs['dish_text'] }}
                <input name="dish_text" value="{{ $inputs['dish_text'] }}" type="hidden">               
                <dt>アップロード写真</dt>
                <dt class="content">
                    <img class="image3" src="{{ asset('storage/' . $inputs['photo']) }}" alt="Dish Photo">
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
