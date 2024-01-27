<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>スパイス一覧画面</title>
</head>
    <style>
    /* tbody {
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
        grid-template-rows: repeat(auto-fill, minmax(100px, 1fr)); /* 各行の高さを均等に調整
    } */
    tbody {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(auto-fill, minmax(100px, 1fr)); /* 各行の高さを均等に調整 */
    }

    /* レスポンシブデザイン */
    @media (max-width: 870px) {
        tbody {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(auto-fill, minmax(100px, 1fr)); /* 各行の高さを均等に調整 */
        }
    } 

        /* レスポンシブデザイン */
        @media (max-width: 600px) {
        tbody {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-template-rows: repeat(auto-fill, minmax(100px, 1fr)); /* 各行の高さを均等に調整 */
        }
    } 

    </style>
<body>
    @include('Top.header')
    @yield('header')
        <div class="main">
            <div class="container">
                <img class="image6" src="{{asset('img/spice_background.jpg')}}"></img>
            </div>
            <div style="background-color: #f9fc6c;">
            <li class="title" >▪スパイス一覧</li>
            <table>
                @foreach($spices as $spice)
                <tr class="content6">    
                    <th class="content">
                    <img class="image3" src="{{asset($spice->photo)}}"></img>
                    </th>
                    <th class="content">名称：{{ $spice->name }}</th>
                    <th class="content">効果：{{ $spice->effect }}</th>
                    <td class="content">
                        <a  href="{{ route('showSpiceDetail', ['id' => $spice->id]) }}" class="detail-link">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
</body>
</html>