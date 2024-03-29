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
            <h3>下記の項目をご記入の上、確認ボタンを押してください</h3>
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
                    <label for="prefecture_id">都道府県</label>
                    <span class="prefecture_id">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('prefecture_id'))
                    <li>{{$errors->first('prefecture_id')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <select id="prefecture_id" name="prefecture_id" class="userType">
                    @foreach ($prefectures as $prefecture)
                    <option value="{{ $prefecture->id , old('prefecture_id') == $prefecture->id ? 'selected' : '' }}">{{ $prefecture->name }}</option>    
                    @endforeach
                    </select>
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
                    <input type="text" name="tel" id="tel" placeholder="06612345678" value="{{ old('tel') }}">
                </dd>
                <dt>
                    <label for="photo">店舗写真 看板・ロゴ・外観・内装 （※拡張子：jpeg,png,jpg,gif 登録可能）</label>
                    <span class="required">*</span>
                </dt>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="file" name="photo" id="photo" class="form-control" value="{{ old('photo') }}">
                </dd>
            </dl>
            <dd class="submit">
                <button type="submit" class="submit">確認</button>
            </dd>
        </form>
    </div>
</body>
</html>