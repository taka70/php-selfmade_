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
        <div class="main2">
            <li class="title" >▪店舗一覧</li>
            <table>
                @foreach($products as $product)
                <tr class="content2">    
                    <th class="content">
                    <img class="image3" src="{{asset($product->photo)}}"></img>
                    </th>
                    <th class="content">{{ $product->name }}</th>
                    <th class="content3">発祥地：{{ $product->country->name }}</th>
                    <td class="content5">リーズナブル：
                        @if ($product->reasonable === 1)
                            <img class="image3" src="{{ asset('img/estimate/coin1.png') }}" alt="Coin 1">
                        @elseif ($product->reasonable === 2)
                            <img class="image3" src="{{ asset('img/estimate/coin2.png') }}" alt="Coin 2">
                        @elseif ($product->reasonable === 3)
                            <img class="image3" src="{{ asset('img/estimate/coin3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                    <td class="content5">辛さ：
                        @if ($product->painfulness === 1)
                            <img class="image3" src="{{ asset('img/estimate/painfulness1.png') }}" alt="Coin 1">
                        @elseif ($product->painfulness === 2)
                            <img class="image3" src="{{ asset('img/estimate/painfulness2.png') }}" alt="Coin 2">
                        @elseif ($product->painfulness === 3)
                            <img class="image3" src="{{ asset('img/estimate/painfulness3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                    <td class="content5">ローカルテイスト:
                        @if ($product->local_taste === 1)
                            <img class="image3" src="{{ asset('img/estimate/ganesha1.png') }}" alt="Coin 1">
                        @elseif ($product->local_taste === 2)
                            <img class="image3" src="{{ asset('img/estimate/ganesha2.png') }}" alt="Coin 2">
                        @elseif ($product->local_taste === 3)
                            <img class="image3" src="{{ asset('img/estimate/ganesha3.png') }}" alt="Coin 3">
                        @endif
                    </td>
                    <td class="content">
                        <a  href="{{ route('showStoreDetail', ['id' => $product->id]) }}" class="detail-link">詳細</a>
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