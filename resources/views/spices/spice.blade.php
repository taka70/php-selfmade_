<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>スパイス一覧画面</title>
</head>
<body>
    @include('Top.header')
    @yield('header')
    <form action="{{ route('showSpiceDetail') }}" method="GET">
        @csrf
        <div class="main">
            <div class="container">
                <img class="image3" src="{{asset('img/spice_background.jpg')}}"></img>
            </div>
            <table>
                <tr>
                    <th class="content">ID</th>
                    <th class="content">写真</th>
                    <th class="content">発祥地</th>
                    <th class="content">リーズナブル</th>
                    <th class="content">辛さ</th>
                    <th class="content">ローカルテイスト</th>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>