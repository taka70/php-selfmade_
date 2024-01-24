<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>ユーザー情報変更</title>
</head>
 <body>
    @include('Top.header')
    @yield('header')
        <div class="contact_box">
        <h2>ユーザー情報変更</h2>
        <form id="myForm" action="{{ route('showUserUpdateConfirm', $id) }}" method="POST">
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
                    <input type="text" name="email" id="email" placeholder="test@test.co.jp" value="{{ old('email', $user->email) }}">
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
                    <input type="text" name="name" id="name" placeholder="山田太郎" value="{{ old('name', $user->name) }}">
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
                    <input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="{{ old('kana', $user->kana) }}">
                </dd>
                <dt>
                    <label for="old_password">現在のPassword</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('old_password'))
                    <li>{{$errors->first('old_password')}}</li>
                    @endif
                </div>
                @if (session('passwordError'))
                    <div class="alert alert-success">
                        {{ session('passwordError')}}
                    </div>
                @endif
                <dd>
                    <div class="form-input-error"></div>
                    <input type="password" name="old_password" id="old_password" value="{{ old('old_password') }}"  placeholder="password">
                </dd>
                <dt>
                    <label for="password">新しいPassword</label>
                    <span class="required">*</span>
                </dt>
                <div class="error-message">
                    @if ($errors->has('password'))
                    <li>{{$errors->first('password')}}</li>
                    @endif
                </div>
                @if (session('newPasswordError'))
                    <div class="alert alert-success">
                        {{ session('newPasswordError')}}
                    </div>
                @endif
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
                    <label for="userType">ユーザー区分</label>
                    <span class="required">*</span>
                </dt>
                <!-- <td>
                    <select name="userType" id="userType" class="userType">
                        <option value="general" selected>一般ユーザー</option>
                        <option value="admin">管理ユーザー</option>
                        <option value="storeStaff">店舗スタッフ</option>
                    </select>
                </td> -->
                <dd>
                    <span>        
                        @if ($user->role == 0)
                            管理ユーザー
                        @elseif ($user->role == 1)
                            一般ユーザー
                        @elseif ($user->role == 2)
                            店舗スタッフ
                        @else
                            未知のユーザー区分
                        @endif
                    </span>
                </dd>
                <dt>
                    <label for="tel">電話番号</label>
                </dt>
                    <div class="error-message">
                        @if ($errors->has('tel'))
                        <li>{{$errors->first('tel')}}</li>
                        @endif
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="tel" id="tel" placeholder="09012345678" value="{{ old('tel', $user->tel) }}">
                </dd>

            </dl>
            <dd class="submit">
                <button type="submit" class="submit">確認</button>
            </dd>
        </form>
    </div>

</body>
</html>