<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>店舗一覧画面</title>
</head>
    <style>
        tbody{
                display: grid;
                grid-template-columns: 25% 25% 25% 25%;
            }

    </style>
<body>
    @include('Top.header')
    @yield('header')
        <div class="main2">
            <li class="title" >▪店舗一覧</li>
            <table>
                @foreach($stores as $store)
                <tr class="content2">    
                    <th class="content">
                    <img class="image3" src="{{ asset('storage/' . $store->photo) }}" alt="Store Photo">
                    </th>
                    <th class="content">{{ $store->name }}</th>
                    <th class="content3">郵便番号：{{ $store->postal_code }}</th>
                    <th class="content3">都道府県：{{ $store->prefecture_id }}</th>
                    <th class="content3">住所1:{{ $store->address1 }}</th>
                    <th class="content3">住所2:{{ $store->address2 }}</th>
                    <th class="content3">電話番号：{{ $store->tel }}</th>
                    <th class="content3">ユーザーID:{{ $store->user_id }}</th>
                    <td class="content">
                        <a  href="{{ route('showStoreDetail', ['id' => $store->id]) }}" class="detail-link">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="content4">
                {{ $stores->links() }} 
            </div>
        </div>
</body>
</html>