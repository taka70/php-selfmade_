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
use App\Models\Product;
use App\Models\Country;


class StoreController extends Controller
{

        /**
     * 店舗画面の表示
     */
    public function showStore(Request $request):View
    {

        $products = Product::paginate(4);

        return view('stores.store', compact('products'));
    }


    /**
     * 店舗詳細画面の表示
     */

    public function showStoreDetail(Request $request, $id)
    {
        // $idを使用して商品を取得するロジック
        $product = Product::findOrFail($id);

        if (!$product) {
            abort(404); // 商品が見つからない場合は404エラーを返す
        }

        return view('stores.storeDetail', compact('product'));
    }

    /**
     * 新規店舗登録画面の表示
     */
    public function showStoreRegister():View
    {
        // prefectures テーブルからデータを取得
        $prefectures = Prefecture::all();

        return view('stores.storeRegister', ['prefectures' => $prefectures]); 
    }

    // public function index(){

    // 	return view('index');
    // }

    public function showStoreConfirm(Request $request)
    {
    
        $inputs = [];

        // バリデーションを実行
        $validatedData = $request->validate([
            'name' => 'required|max:10',
            'postal_code' => 'required|regex:/^[0-9]*$/',
            'prefecture_id' => 'nullable',
            'address1' => 'required|max:20',
            'address2' => 'required|max:20',
            'email' => 'nullable|email',
            'tel' => 'required|regex:/^[0-9]*$/',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // dd($request->file('file'));
        // $inputs->prefecture_id = $validatedData['prefecture_id'];

        // // 都道府県名を取得
        // $prefecture = Prefecture::find($inputs['prefecture_id']);
        // 都道府県名を取得
        $prefecture = Prefecture::find($validatedData['prefecture_id']);
        
        // これで$prefecture->nameを使用して都道府県名にアクセスできます
        $inputs['prefecture->name'] = $prefecture->name;
        $inputs['name'] = $validatedData['name'];
        $inputs['postal_code'] = $validatedData['postal_code'];
        $inputs['address1'] = $validatedData['address1'];
        $inputs['address2'] = $validatedData['address2'];
        $inputs['email'] = $validatedData['email'];
        $inputs['tel'] = $validatedData['tel'];
        // $inputs['photo'] = $validatedData['photo'];
        $dir = 'img';

        $request->file('photo')->store('public/photos' . $dir);

        // $inputs = $request->all();
        
        // $file_name = $request->file('photo')->getClientOriginalName();

        // $request->file('file')->storeAs('public',$file_name);

        // $request->file('photo')->store('public');
        // ファイルがアップロードされているかを確認
        // if ($request->hasFile('photo')) {
        //     $photoPath = $request->file('photo')->store('public/photos');
        //     $inputs['photo'] = $photoPath;
        // }

        // 問題がなければ入力内容確認ページのviewに変数を渡して表示
        return view('stores.storeConfirm', ['inputs' => $inputs]);        
    }

    /**
     * 新規店舗登録完了画面の表示
     */
    public function showStoreComplete(Request $request)
    {
        // 戻るボタンをクリックされた場合
        if($request->input('back') == 'back'){
            return redirect('/storeRegister')->withInput();
        }

        // ファイルがアップロードされているか確認
        if ($request->hasFile('photo')) {
            // ファイルが存在する場合、ストレージに保存する
            $request->file('photo')->store('public');
        }

        // 入力内容をデータベースに保存
        $store = new Store($inputs);

        $store->name = $request->input('name');
        $store->postal_code = $request->input('postal_code');
        $store->prefecture = $request->input('prefecture_id');
        $store->address1= $request->input('address1');
        $store->address2 = $request->input('address2');
        $store->email = $request->input('email');
        $store->tel = $request->input('tel');
        $store->file = $request->input('photo');
       
        $image->photo = $file_name;
        $image->file_path = 'storage/app/public/photos' . $dir . '/' . $photo;
        $image->save();

        $store->save();

        Storage::putFile('',$request->file('photo'));

        $request->file('photo')->store('public');

        return view('stores.storeComplete'); 
    }

}


