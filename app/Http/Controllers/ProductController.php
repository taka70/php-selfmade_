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
use App\Models\Product;
use App\Models\Country;


class ProductController extends Controller
{
    /**
     * 商品画面の表示
     */
    public function showProduct(Request $request):View
    {

        $products = Product::paginate(4);

        return view('products.product', compact('products'));
    }


    /**
     * 商品詳細画面の表示
     */

    public function showProductDetail(Request $request, $id)
    {
        // $idを使用して商品を取得するロジック
        $product = Product::findOrFail($id);

        if (!$product) {
            abort(404); // 商品が見つからない場合は404エラーを返す
        }

        return view('products.productDetail', compact('product'));
    }


}


