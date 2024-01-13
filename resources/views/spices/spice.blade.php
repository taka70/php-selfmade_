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
        <div class="main">

            <div class="container">
                <img class="image3" src="{{asset('img/spice_background.jpg')}}"></img>
            </div>
            <div>
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