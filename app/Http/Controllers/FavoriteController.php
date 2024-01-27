<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;
use App\Models\Prefecture;
use App\Models\Country;

class FavoriteController extends Controller
{
    /**
     * お気に入り画面の表示
     */
    public function showFavorite(Request $request): View
    {
        // 現在ログイン中のユーザーを取得
        $user = Auth::user();

        // 現在ログイン中のユーザーのお気に入り情報を取得
        $favorites = $user->favorites()->paginate(4);

        // お気に入り情報から関連する店舗情報を取得
        $stores = $favorites->map(function ($favorite) {
            return $favorite->store_id;
        });

        // // 各店舗の都道府県名を取得
        // $prefectureNames = $favorites->map(function ($favorite) {
        //     // $favorite->store_id が店舗IDであることを仮定しています
        //     $favorite = Store::find($favorite->store);
        //     return $store ? Prefecture::find($favorite->prefecture_id)->name : null;
        // });

        // dd($stores);

        // 各店舗の都道府県idを取得
        $prefectures = Store::whereIn('id', $stores)->get()->map(function ($store) {
            return $store->prefecture; // これはPrefectureモデルのインスタンスを取得しています
        });

        // 各都道府県idから都道府県名を取得
        $prefectureNames = $prefectures->map(function ($prefecture) {
            return Prefecture::find($prefecture)->name;
        });

        // dd($prefectureNames);

        return view('favorites.favorite', compact('stores','favorites', 'prefectureNames'));
    }
}


