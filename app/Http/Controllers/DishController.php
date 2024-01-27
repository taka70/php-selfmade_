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
use App\Models\Dish;
use App\Models\Store;
use App\Models\Country;

class DishController extends Controller
{

    // /**
    //  * 商品画面の表示
    //  */
    // public function showDish(Request $request):View
    // {

    //     $dishes = Dish::paginate(4);

    //     return view('dishes.dish', compact('dishes'));
    // }


    // /**
    //  * 料理詳細画面の表示
    //  */

    // public function showDishDetail(Request $request, $id)
    // {
    //     // $idを使用して商品を取得するロジック
    //     $dish = Dish::findOrFail($id);

    //     if (!$dish) {
    //         abort(404); // 商品が見つからない場合は404エラーを返す
    //     }

    //     return view('dishes.dishDetail', compact('dish'));
    // }

    /**
     * 新規店舗Menu登録画面の表示
     */
    public function showDishRegister():View
    {
        // prefectures テーブルからデータを取得
        $countries = Country::all();

        // 現在ログイン中のユーザーを取得
        $user = Auth::user();

        // ユーザーに関連する店舗情報を取得
        $stores = Store::where('user_id', $user->id)->get();

        // 取得した店舗情報を出力
        // dd($stores);

        // ユーザーに関連する店舗情報を取得
        // $stores = $user->store_id;

        return view('dishes.dishesRegister', ['countries' => $countries, 'stores' => $stores ]); 
    }

    // public function index(){

    // 	return view('index');
    // }

    /**
     * 新規店舗Menu内容確認画面の表示
     */
    public function showDishConfirm(Request $request)
    {
        // dd( $request);

        // バリデーションを実行
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|regex:/^[0-9]*$/',
            'country_id' => 'required',
            'reasonable' => 'required',
            'painfulness' => 'required',
            'local_taste' => 'required',
            'dish_text' => 'nullable|max:255',
            'store_id' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 国名を取得
        $country = Country::where('id', $validatedData['country_id'])->first();
        // これで$country->nameを使用して国名にアクセスできます
        $inputs['country_id'] = $country->name;

        // dd( $country);
        // フォームからの入力値を全て取得
        $inputs = $request->all();
        // dd( $inputs );

        $image = $request->file('photo');
        // dd($image);
        // 画像がアップロードされていれば、storageに保存
        if($request->hasFile('photo')){
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
            $inputs['photo'] = end($path);

            // セッションに削除するためのファイルパスを保存
            $request->session()->put('delete_photo_path', $path);
        }else{
            $path = null;
        }

        // 国名を取得
        $country = Country::find($validatedData['country_id']);
        $countryName = $country->name;

        // 店舗名を取得
        $store = Store::find($validatedData['store_id']);
        $storeName = $store->name;

        // dd($inputs);
        // 問題がなければ入力内容確認ページのviewに変数を渡して表示
        return view('dishes.dishesConfirm', compact('countryName', 'storeName','inputs'));       
    }

    /**
     * 新規店舗Menu登録完了画面の表示
     */
    public function showDishComplete(Request $request)
    {
        // 戻るボタンをクリックされた場合
        if($request->input('back') == 'back'){
            // セッションからファイルパスを取得し、ファイルを削除
            $deletePath = $request->session()->get('delete_photo_path');
            if (!empty($deletePath)) {
                Storage::delete('/public/' . end($deletePath));
            }
            return redirect('/dishRegister')->withInput();
        }

        // // ファイルがアップロードされているか確認
        // if ($request->hasFile('photo')) {
        //     // ファイルが存在する場合、ストレージに保存する
        //     $request->file('photo')->store('public');
        // }

        // $image = $request->file('photo');
        // dd($image);
        // // 画像がアップロードされていれば、storageに保存
        // if($request->hasFile('photo')){
        //     $path = \Storage::put('/public', $image);
        //     $path = explode('/', $path);
        // }else{
        //     $path = null;
        // }

        // ログインしている場合、ユーザーのIDを取得
        // Auth::check();
        // $user_id = Auth::id();
        // dd($user_id);

        // if (Auth::check()) {
        //     $user_id = Auth::id();
        //     // ここで $user_id を使用できます
        // } else {
        //     // ログインしていない場合の処理
        // }


        // 入力内容をデータベースに保存
        $dish = new Dish();

        $dish->name = $request->input('name');
        $dish->price = $request->input('price');
        $dish->country_id= $request->input('country_id');
        $dish->dish_text = $request->input('dish_text');
        $dish->store_id = $request->input('store_id');
        $dish->photo = $request->input('photo');
        // dd( $dish);

        $reasonable= $request->input('reasonable');
        $painfulness = $request->input('painfulness');
        $local_taste = $request->input('local_taste');

        if ($reasonable === '1') {
            $dish->reasonable = 1; 
        } elseif ($reasonable === '2') {
            $dish->reasonable = 2; 
        } else {
            $dish->reasonable = 3; 
        }

        if ($painfulness === '1') {
            $dish->painfulness = 1; 
        } elseif ($painfulness === '2') {
            $dish->painfulness = 2; 
        } else {
            $dish->painfulness = 3; 
        }

        if ($local_taste === '1') {
            $dish->local_taste = 1; 
        } elseif ($local_taste === '2') {
            $dish->local_taste = 2; 
        } else {
            $dish->local_taste = 3; 
        }
        


        $dish->save();

        // Storage::putFile('',$request->file('photo'));

        // $request->file('photo')->store('public');

        return view('dishes.dishesComplete'); 
    }

}


