<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>スパイス一覧画面</title>
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
</head>
<body>
    @include('Top.header')
    @yield('header')
        <div class="main2">
            <li class="title" >▪商品一覧</li>
            <table>
                @foreach($products as $product)
                <tr class="content9">    
                    <th class="content">
                    <img class="image7" src="{{asset($product->photo)}}"></img>
                    </th>
                    <th class="content">{{ $product->name }}</th>
                    <th class="content3">発祥地：{{ $product->country->name }}</th>
                    <td class="content5">リーズナブル：
                        @if ($product->reasonable === 1)
                            <img class="image8" src="{{ asset('img/estimate/coin1.png') }}" alt="Coin 1">
                        @elseif ($product->reasonable === 2)
                            <img class="image9" src="{{ asset('img/estimate/coin2.png') }}" alt="Coin 2">
                        @elseif ($product->reasonable === 3)
                            <img class="image10" src="{{ asset('img/estimate/coin3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                    <td class="content5">辛さ：
                        @if ($product->painfulness === 1)
                            <img class="image11" src="{{ asset('img/estimate/painfulness1.png') }}" alt="Coin 1">
                        @elseif ($product->painfulness === 2)
                            <img class="image9" src="{{ asset('img/estimate/painfulness2.png') }}" alt="Coin 2">
                        @elseif ($product->painfulness === 3)
                            <img class="image10" src="{{ asset('img/estimate/painfulness3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                    <td class="content5">ローカルテイスト:
                        @if ($product->local_taste === 1)
                            <img class="image12" src="{{ asset('img/estimate/ganesha1.png') }}" alt="Coin 1">
                        @elseif ($product->local_taste === 2)
                            <img class="image9" src="{{ asset('img/estimate/ganesha2.png') }}" alt="Coin 2">
                        @elseif ($product->local_taste === 3)
                            <img class="image10" src="{{ asset('img/estimate/ganesha3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                    <td class="content">
                        <a  href="{{ route('showProductDetail', ['id' => $product->id]) }}" class="detail-link">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="content4">
                {{ $products->links() }} 
            </div>
        </div>
</body>
</html>