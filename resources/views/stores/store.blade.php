<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/UserStyle.css') }}">
    <!-- <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-...your-integrity-code-here..." crossorigin="anonymous">

    <title>店舗一覧画面</title>
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

    /* div {
        display: flex;
        justify-content: center; 
        text-decoration: underline;
    } */

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
        <div class="main2">
            <li class="title" >▪店舗一覧</li>
            <table>
                @foreach($stores as $index => $store)
                <tr class="content2">    
                    <th class="content">
                    <img class="image4" src="{{ asset('storage/' . $store->photo) }}" alt="Store Photo">
                    </th>
                    <th class="content">{{ $store->name }}</th>
                    <th class="content3">〒{{ $store->postal_code }}</th>
                    <th class="content3">住所：{{ $prefectureNames[$index] }}</th>
                    <th class="content3">{{ $store->address1 }}</th>
                    <th class="content3">{{ $store->address2 }}</th>
                    <th class="content3">電話番号：{{ $store->tel }}</th>
                    <th class="content3">ユーザーID:{{ $store->user_id }}</th>
                    <td class="content">
                    @if($store->is_favorite_by_user())
                        <a href="{{ route('store.toggleFavorite', ['id' => $store->id]) }}" class="btn btn-tag btn-tag--favorited">
                        <i class="fas fa-star"></i>お気に入り済
                        </a>
                    @else
                        <a href="{{ route('store.toggleFavorite', ['id' => $store->id]) }}" class="btn btn-tag btn-tag--favorite">
                        <!-- <i class="fa-regular fa-star"></i>お気に入り追加 -->
                        <i class="far fa-star"></i> お気に入り追加
                        </a>
                    @endif
                    </td>
                    <td class="content">
                        <a  href="{{ route('showStoreDetail', ['id' => $store->id]) }}" class="detail-link">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="content4">
                {{ $stores->links() }} 
            </div>
            <i class="fa-solid fa-arrow-up-right-from-square" style="color:#2da690;"></i>
        </div>
</body>
</html>