<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
<title>ユーザー管理</title>
<head>
    <style>
                
        table {
            display: flex;
            justify-content: center;
            border-collapse: collapse;
            width: auto; /* 自動幅調整 */
            margin: 0 auto; /* 中央寄せ */
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 3px solid #ddd; /* 枠線を追加 */
        }

        th {
            margin: 5px;
        }

        /* 隔行ごとに背景色を変更 */
        tr:nth-child(odd) {
            background-color: rgb(131 203 245);
        }

        div {
            display: flex;
            justify-content: center; 
            text-decoration: underline;
        }

        .pagination li {
            display: inline-block;
        }

        .title {
            display: inline-block;
            font-weight: bold;
            font-size: 30px;
            margin: 20px;
        }

        .content {
            text-align: center;
        }

        .btn_content {
            display: flex;
            justify-content: flex-end;
        }

        .btn_logout {
            background-color: greenyellow;
            margin: 20px;
            padding: 20px;
            border: 3px solid #ddd;
        }

        .text_type {
            color:red;
        } 

        tbody{
            width: 98%;
            display: grid;
            /* grid-template-columns: 25% 25% 25% 25%; */
        }

    </style>
</head>
    <body>
    @include('Top.header')
    @yield('header')
    <li class="title" >▪ユーザーデータ</li>
    <table>
        <tr class="tableColor">
            <th class="content">ID</th>
            <th class="content">ユーザー名</th>
            <th class="content">フリガナ</th>
            <th class="content">メールアドレス（ユーザーID）</th>
            <th class="content">ユーザー区分</th>
            <th class="content">電話番号</th>
            <th></th>
        </tr>
        @foreach($users as $user)
            <tr class="tableColor"> 
                <th class="content">{{ $user->id }}</th>
                <th class="content">{{ $user->name }}</th>
                <th class="content">{{ $user->kana }}</th>
                <th class="content">{{ $user->email }}</th>
                <th class="content">
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
                </th>
                <th class="content">{{ $user->tel }}</th>
                <td class="content">
                    <form action="{{ route('softDelete', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        <button type="submit" onclick="return confirm('本当に削除しますか？')" class="delete-link">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
        <div>
        {{ $users->links() }}
        </div>
    </body>
</html>