<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>店舗Menu登録</title>
</head>
<body>
    @include('Top.header')
    @yield('header')
        <div class="contact_box">
        <h2>店舗Menu登録</h2>
        <form id="myForm" action="{{ route('showDishConfirm') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <h3>下記の項目をご記入の上、確認ボタンを押してください</h3>
            <p><span class="required">*</span>
            は必須項目となります。</p>
            <dl>
                <dt>
                    <label for="name">料理名</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('name'))
                    <li>{{$errors->first('name')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="name" id="name" placeholder="チキンカレー" value="{{ old('name') }}">
                </dd>
                <dt>
                    <label for="price">価格</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('price'))
                    <li>{{$errors->first('price')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="price" id="price" placeholder="980" value="{{ old('price') }}">
                </dd>
                <dt>
                    <label for="country_id">発祥地</label>
                    <span class="country_id">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('country_id'))
                    <li>{{$errors->first('country_id')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <select id="country_id" name="country_id" class="userType">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id , old('country_id') == $country->id ? 'selected' : '' }}">{{ $country->name }}</option>
                    @endforeach
                    </select>
                </dd>
                <dt>
                    <label for="reasonable">リーズナブル</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('reasonable'))
                    <li>{{$errors->first('reasonable')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="reasonable" id="reasonable" placeholder="1" value="{{ old('reasonable') }}">
                </dd>
                <dt>
                    <label for="painfulness">辛さ</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('painfulness'))
                    <li>{{$errors->first('painfulness')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="painfulness" id="painfulness" placeholder="1" value="{{ old('painfulness') }}">
                </dd>
                <dt>
                    <label for="tel">ローカルテイスト</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('local_taste'))
                    <li>{{$errors->first('local_taste')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="local_taste" id="local_taste" placeholder="1" value="{{ old('local_taste') }}">
                </dd>
                <dt>
                    <label for="dish_text">料理説明</label>
                    <span class="required"></span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('dish_text'))
                    <li>{{$errors->first('dish_text')}}</li>
                    @endif
                </div>
                <dl class="body">
                    <dd>
                        <div class="form-input-error"></div>
                        <textarea name="dish_text" id="dish_text">{{ old('dish_text') }}</textarea>
                    </dd>
                </dl>
                <dt>
                    <label for="photo">店舗名</label>
                    <span class="required">*</span>
                </dt>
                <dd>
                    <div class="form-input-error"></div>
                    @if ($stores)
                        <select id="store_id" name="store_id" class="userType">
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </dd>

                <dt>
                    <label for="photo">商品写真</label>
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