<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>商品詳細画面</title>
</head>
<body>
    @include('Top.header')
    @yield('header') 
    <li class="title" >▪商品詳細</li>       
        @if(isset($product))
            <div class="main2">
                    <div class="container5">  
                        <div class="content10">
                            <div class="content7">{{ $product->name }}</div>
                            <div class="content8">価格:￥{{ $product->price }}</div> 
                            <div class="content8">発祥地：{{ $product->country->name }}</div>
                            <div class="content8 main3">価格帯：
                                @if ($product->reasonable === 1)
                                    <img class="image8_1" src="{{ asset('img/estimate/coin1.png') }}" alt="Coin 1">
                                @elseif ($product->reasonable === 2)
                                    <img class="image9_1" src="{{ asset('img/estimate/coin2.png') }}" alt="Coin 2">
                                @elseif ($product->reasonable === 3)
                                    <img class="image10_1" src="{{ asset('img/estimate/coin3.png') }}" alt="Coin 3">
                                @endif
                            </div>
                            <div class="content8 main3">辛さ：
                                @if ($product->painfulness === 1)
                                    <img class="image11_1" src="{{ asset('img/estimate/painfulness1.png') }}" alt="Coin 1">
                                @elseif ($product->painfulness === 2)
                                    <img class="image9_1" src="{{ asset('img/estimate/painfulness2.png') }}" alt="Coin 2">
                                @elseif ($product->painfulness === 3)
                                    <img class="image10_1" src="{{ asset('img/estimate/painfulness3.png') }}" alt="Coin 3">
                                @endif
                            </div>
                            <div class="content8 main3">味わい:
                                @if ($product->local_taste === 1)
                                    <li>日本人向け</li>
                                @elseif ($product->local_taste === 2)
                                    <li>少し現地よりの味わい</li>
                                @elseif ($product->local_taste === 3)
                                    <li>現地の風味</li>
                                @endif
                            </div>
                        </div>
                        <div class="content">
                            <img class="image7" src="{{asset($product->photo)}}"></img>
                        </div>   
                    </div>
            <div class="content4">
                <a  href="{{ route('showProduct', ['id' => $product->id] ) }}" class="back-link">戻る</a>
            </div>
        @endif
</body>
</html>