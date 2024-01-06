<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>新規店舗登録</title>
</head>
<body>
    @include('Top.header')
    @yield('header')
        <div class="contact_box">
        <h2>新規店舗登録</h2>
        <form id="myForm" action="{{ route('showStoreConfirm') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
            <p><span class="required">*</span>
            は必須項目となります。</p>
            <dl>
                <dt>
                    <label for="name">店舗名</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('name'))
                    <li>{{$errors->first('name')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="name" id="name" placeholder="カレー屋" value="{{ old('name') }}">
                </dd>
                <dt>
                    <label for="postal_code">郵便番号</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('postal_code'))
                    <li>{{$errors->first('postal_code')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="postal_code" id="postal_code" placeholder="123-4567" value="{{ old('postal_code') }}">
                </dd>
                <dt>
                    <label for="prefecture">都道府県</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('prefecture'))
                    <li>{{$errors->first('prefecture')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="prefecture" id="prefecture" placeholder="大阪府" value="{{ old('prefecture') }}">
                </dd>
                <dt>
                    <label for="address1">住所1</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('address1'))
                    <li>{{$errors->first('address1')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="address1" id="address1" placeholder="北区梅田" value="{{ old('address1') }}">
                </dd>
                <dt>
                    <label for="address2">住所2（番地以下・建物名・階数）</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('address2'))
                    <li>{{$errors->first('address2')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="address2" id="address2" placeholder="1丁目 はなまるビル4F" value="{{ old('address2') }}">
                </dd>
                <dt>
                    <label for="email">メールアドレス</label>
                </dt>
                <div class="error-message">
                    @if ($errors->has('email'))
                        <li>{{$errors->first('email')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="email" id="email" placeholder="test@test.co.jp" value="{{ old('email') }}">
                </dd>
                <dt>
                    <label for="tel">電話番号</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('tel'))
                    <li>{{$errors->first('tel')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="tel" id="tel" placeholder="06612345678" value="{{ old('number') }}">
                </dd>
                <dt>
                    <label for="file">店舗写真（看板・ロゴ・外観・内装）</label>
                    <span class="required">*</span>
                </dt>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="file" name="file" id="file" class="form-control" value="{{ old('file') }}">
                </dd>
            </dl>
            <dd class="submit">
                <button type="submit" class="submit">確認</button>
            </dd>
        </form>
    </div>
</body>
</html>