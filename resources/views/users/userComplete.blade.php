<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>新規ユーザー登録完了</title>
</head>
<body>
    <section>
        <div class="contact_box">
            <h2>新規ユーザー登録完了</h2>
            <div class="complete_msg">
                <p>問題なくユーザー新規情報を登録完了しました。</p>
                <a href="{{ route('showLogin')}}" class="submit">ログインページへ戻る</a>
            </div>
        </div>
    </section>
</body>
</html>
