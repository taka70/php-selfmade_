<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>ユーザー登録情報画面</title>
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
        <div class="contact_box">
        <h2>ユーザー登録情報</h2>
        <form action="{{ route('showUserComplete') }}" method="POST">
        @csrf
            <p>下記のユーザー登録情報をご確認の上送信ボタンを押してください。</p>
            <p>内容を訂正する場合は戻るを押してください。</p>
            <dl class="confirm">
                <dt>ユーザーID</dt>
                {{ $inputs['email'] }}
                <input name="email" value="{{ $inputs['email'] }}" type="hidden">
                <dt>ユーザー名</dt>
                {{ $inputs['name'] }}
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                <dt>フリガナ</dt>
                {{ $inputs['kana'] }}
                <input name="kana" value="{{ $inputs['kana'] }}" type="hidden">
                <dt>Password</dt>
                <dd>{{ str_repeat('*', strlen($inputs['password'])) }}</dd>
                <input name="password" value="{{ $inputs['password'] }}" type="hidden">
                <dt>ユーザー区分</dt>
                {{ $inputs['userType'] }}
                <input name="userType" value="{{ $inputs['userType'] }}" type="hidden">
                <dt>電話番号</dt>
                {{ $inputs['number'] }}
                <input name="number" value="{{ $inputs['number'] }}" type="hidden">
                <dd class="confirm_btn">
                    <button type="submit" name="back" value="back" style="background-color: lightblue; margin-left: 10px;">戻る</button>
                    <button type="submit" class="btn_style1">登録</button>
                </dd>
            </dl>
        </form>
<script src="{{ asset('js/index1.js') }}"></script>
</body>
</html>
