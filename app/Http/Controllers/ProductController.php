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


class ProductController extends Controller
{
    /**
     * 商品画面の表示
     */
    public function showProduct():View
    {

    return view('products.product');
    }


    /**
     * 商品詳細画面の表示
     */
    public function showProductDetail():View
    {

        // $product = Product::find($id); 

    return view('products.productDetail');
    // return view('products.productDetail',compact('product')):
    }

    //  /**
    //  * 詳細画面の表示
    //  */
    // public function show($id)
    // {
    //     $player = Player::find($id); 
    //        // 総得点の計算
    //        $totalGoals = $player->goals()->count(); // "goals" は選手の得点を格納するテーブル名

    //        // 得点履歴の取得
    //        $goalHistory = $player->goals()->get(); // "goals" は選手の得点を格納するテーブル名
   
    //        return view('players.detail', compact('player', 'totalGoals', 'goalHistory'));
    //    }

}


