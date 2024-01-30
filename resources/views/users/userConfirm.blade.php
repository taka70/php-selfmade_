<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>新規ユーザー登録情報内容</title>
<head>
</head>
<body>
        <div class="contact_box">
        <h2>新規ユーザー登録情報内容</h2>
        <form action="{{ route('showUserComplete') }}" method="POST">
        @csrf
            <p>下記の新規ユーザー登録情報内容をご確認の上、問題なければ登録ボタンを押してください。</p>
            <p>内容を訂正する場合は戻るを押してください。</p>
            <dl class="confirm">
                <dt>ユーザーID</dt>
                <li>{{ $inputs['email'] }}</li>
                <input name="email" value="{{ $inputs['email'] }}" type="hidden">
                <dt>ユーザー名</dt>
                <li>{{ $inputs['name'] }}</li>
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                <dt>フリガナ</dt>
                <li>{{ $inputs['kana'] }}</li>
                <input name="kana" value="{{ $inputs['kana'] }}" type="hidden">
                <dt>Password</dt>
                <li>{{ str_repeat('*', strlen($inputs['password'])) }}</li>
                <input name="password" value="{{ $inputs['password'] }}" type="hidden">
                <dt>ユーザー区分</dt>
                <li>{{ $inputs['userType'] }}</li>
                <input name="userType" value="{{ $inputs['userType'] }}" type="hidden">
                <dt>電話番号</dt>
                <li>{{ $inputs['tel'] }}</li>
                <input name="tel" value="{{ $inputs['tel'] }}" type="hidden">
                <dd class="confirm_btn">
                    <button type="submit" name="back" value="back" style="background-color: lightblue; margin-left: 10px;">戻る</button>
                    <button type="submit" class="btn_style1">登録</button>
                </dd>
            </dl>
        </form>
<script src="{{ asset('js/index1.js') }}"></script>
</body>
</html>
