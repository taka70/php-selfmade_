<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>店舗詳細画面</title>
</head>
    <style>
        tbody {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(auto-fill, minmax(100px, 1fr)); /* 各行の高さを均等に調整 */
        }

        /* レスポンシブデザイン */
        @media (max-width: 980px) {
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
    <li class="title" >▪店舗詳細</li>       
        @if(isset($store))
            <div class="main2">
                <div class="content2 border_line">  
                    <div class="container5">  
                        <div class="content11">
                            <div class="content7">{{ $store->name }}</div>
                            <div class="content8">
                                住所：〒{{ $store->postal_code }}<br>
                                <span>{{ $prefectureName }}</span><br>
                                <span>{{ $store->address1 }}</span><br>
                                <span>{{ $store->address2 }}</span>
                            </div>
                            <div class="content8">電話番号：{{ $store->tel }}</div>
                        </div>
                        <div class="content">
                            <img class="image3" src="{{asset('storage/' . $store->photo) }}"></img>
                        </div>   
                    </div>
                </div>
                <table>
                @foreach($dishes as $index => $dish)
                <tr class="content9">    
                    <th class="content">
                    <img class="image3" src="{{asset('storage/' . $dish->photo)}}"></img>
                    </th>
                    <th class="content">{{ $dish->name }}</th>
                    <th class="content3">価格：{{ $dish->price }}</th>
                    <th class="content3">発祥地：{{ $countries[$index] }}</th>
                    <td class="content5">リーズナブル：
                        @if ($dish->reasonable === 1)
                            <img class="image8" src="{{ asset('img/estimate/coin1.png') }}" alt="Coin 1">
                        @elseif ($dish->reasonable === 2)
                            <img class="image9" src="{{ asset('img/estimate/coin2.png') }}" alt="Coin 2">
                        @elseif ($dish->reasonable === 3)
                            <img class="image10" src="{{ asset('img/estimate/coin3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                    <td class="content5">辛さ：
                        @if ($dish->painfulness === 1)
                            <img class="image11" src="{{ asset('img/estimate/painfulness1.png') }}" alt="Coin 1">
                        @elseif ($dish->painfulness === 2)
                            <img class="image9" src="{{ asset('img/estimate/painfulness2.png') }}" alt="Coin 2">
                        @elseif ($dish->painfulness === 3)
                            <img class="image10" src="{{ asset('img/estimate/painfulness3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                    <td class="content5">ローカルテイスト:
                        @if ($dish->local_taste === 1)
                            <img class="image12" src="{{ asset('img/estimate/ganesha1.png') }}" alt="Coin 1">
                        @elseif ($dish->local_taste === 2)
                            <img class="image9" src="{{ asset('img/estimate/ganesha2.png') }}" alt="Coin 2">
                        @elseif ($dish->local_taste === 3)
                            <img class="image10" src="{{ asset('img/estimate/ganesha3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="content4">
                <a  href="{{ route('showStore') }}" class="back-link">戻る</a>
            </div>
        @endif
</body>
</html>