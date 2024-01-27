<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <title>お気に入り一覧画面</title>
</head>
    <style>
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
    <div class="main2">
        <li class="title">お気に入り</li>
        <table>
            @foreach($favorites as $index => $favorite)
                <tr class="content2">    
                    <th class="content">
                        <img class="image4" src="{{ asset('storage/' . $favorite->store->photo) }}" alt="Store Photo">
                    </th>
                    <th class="content">{{ $favorite->store->name }}</th>
                    <th class="content3">〒{{ $favorite->store->postal_code }}</th>
                    <th class="content3">住所：{{  $prefectureNames[$index] }}</th>
                    <th class="content3">{{ $favorite->store->address1 }}</th>
                    <th class="content3">{{ $favorite->store->address2 }}</th>
                    <th class="content3">電話番号：{{ $favorite->store->tel }}</th>
                    <th class="content3">ユーザーID:{{ $favorite->store->user_id }}</th>
                <!-- </tr>
                <td class="content"> -->
                    <th>
                        <a  href="{{ route('showStoreDetail', ['id' => $favorite->store->id]) }}" class="detail-link">詳細</a>
                    </th>
                        <!-- </td> -->
                </tr>
            @endforeach
        </table>
        <div class="content4">
            {{ $favorites->links() }} 
        </div>
    </div>
</body>
</html>