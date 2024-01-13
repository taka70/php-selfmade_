<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>ユーザー情報編集</title>
</head>
 <body>
    @include('Top.header')
    @yield('header')
        <div class="contact_box">
        <h2>ユーザー情報編集</h2>
        <form id="myForm" action="{{ route('showUserConfirm') }}" method="POST">
        @csrf
            <h3>下記の項目をご記入の上、確認ボタンを押してください</h3>
            <p><span class="required">*</span>
            は必須項目となります。</p>
            <dl>
            </dt>
                <dt>
                    <label for="email">ログインID</label>
                    <span class="required">*</span>
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
                    <label for="name">ユーザー名</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('name'))
                    <li>{{$errors->first('name')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="name" id="name" placeholder="山田太郎" value="{{ old('name') }}">
                </dd>
                <dt>
                    <label for="kana">フリガナ</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('kana'))
                    <li>{{$errors->first('kana')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="{{ old('kana') }}">
                </dd>
                <dt>
                    <label for="password">Password</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('password'))
                    <li>{{$errors->first('password')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="password" name="password" id="password" value="{{ old('password') }}"  placeholder="password">
                </dd>
                <dt>
                    <label for="confirm-password">確認用Password</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('password_confirmation'))
                    <li>{{$errors->first('password_confirmation')}}</li>
                    @endif
                </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation">
                </dd>
                <dt>
                    <label for="confirm-password">ユーザー区分</label>
                    <span class="required">*</span>
                </dt>
                <td>
                    <select name="userType" id="userType" class="userType">
                        <option value="general" selected>一般ユーザー</option>
                        <option value="admin">管理ユーザー</option>
                        <option value="storeStaff">店舗スタッフ</option>
                    </select>
                </td>
                <dt>
                    <label for="number">電話番号</label>
                </dt>
                    <div class="error-message">
                        @if ($errors->has('number'))
                        <li>{{$errors->first('number')}}</li>
                        @endif
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="number" id="number" placeholder="09012345678" value="{{ old('number') }}">
                </dd>

            </dl>
            <dd class="submit">
                <button type="submit" class="submit">確認</button>
            </dd>
        </form>
    </div>

</body>
</html>