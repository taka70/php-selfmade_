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
use App\Models\Dish;
use App\Models\Prefecture;
use App\Models\Country;

class StoreController extends Controller
{

    /**
     * 店舗画面の表示
     */
    public function showStore(Request $request):View
    {

        $stores = Store::paginate(4);
        
        //dd($);
        // 各店舗の都道府県名を取得
        $prefectureNames = $stores->map(function ($store) {
            return Prefecture::find($store->prefecture)->name;
        });
        // dd($prefectureNames);
        // // 都道府県名を取得
        // $prefecture = Prefecture::find($stores['prefecture']);
        // $prefectureName = $prefecture->name;

        return view('stores.store', compact('stores', 'prefectureNames'));
    }


    /**
     * 店舗詳細画面の表示
     */

    public function showStoreDetail(Request $request, $id)
    {
        // $idを使用して商品を取得するロジック
        $store = Store::findOrFail($id);

        if (!$store) {
            abort(404); // 商品が見つからない場合は404エラーを返す
        }


        // 各店舗の都道府県名を取得
        $prefectureName = Prefecture::find($store->prefecture)->name;
        // dd($prefectureName);
        // $dishes = Dish::findOrFail($id);

        // 店舗に紐づく料理（商品）を取得
        // $dishes = $store->dishes;
        $dishes = Dish::where('store_id', $id)->get();
        // dd($dishes);

        // 国名を取得
        $countries = [];
        foreach ($dishes as $dish) {
            $country = Country::find($dish->country_id);
            if ($country) {
                $countries[] = $country->name;
            } else {
                $countries[] = 'Unknown'; // もし国が見つからない場合のデフォルト値を設定
            }
        }

        return view('stores.storeDetail', compact('store', 'dishes', 'prefectureName', 'countries'));
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
    
        // バリデーションを実行
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'postal_code' => 'required|regex:/^[0-9]*$/',
            'prefecture_id' => 'required',
            'address1' => 'required|max:20',
            'address2' => 'required|max:20',
            'tel' => 'required|regex:/^[0-9]*$/',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 都道府県名を取得
        $prefecture = Prefecture::where('id', $validatedData['prefecture_id'])->first();
        // これで$prefecture->nameを使用して都道府県名にアクセスできます
        $inputs['prefecture_id'] = $prefecture->name;

        // dd($prefecture);
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

        // 都道府県名を取得
        $prefecture = Prefecture::find($validatedData['prefecture_id']);
        $prefectureName = $prefecture->name;


        // dd($prefectureName);
        // 問題がなければ入力内容確認ページのviewに変数を渡して表示
        return view('stores.storeConfirm', compact('prefectureName', 'inputs'));

    }

    /**
     * 新規店舗登録完了画面の表示
     */
    public function showStoreComplete(Request $request)
    {
        // 戻るボタンをクリックされた場合
        if($request->input('back') == 'back'){
            // セッションからファイルパスを取得し、ファイルを削除
            $deletePath = $request->session()->get('delete_photo_path');
            if (!empty($deletePath)) {
                Storage::delete('/public/' . end($deletePath));
            }
            return redirect('/storeRegister')->withInput();
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
        Auth::check();
        $user_id = Auth::id();
        // dd($user_id);

        // if (Auth::check()) {
        //     $user_id = Auth::id();
        //     // ここで $user_id を使用できます
        // } else {
        //     // ログインしていない場合の処理
        // }


        // 入力内容をデータベースに保存
        $store = new Store();

        $store->name = $request->input('name');
        $store->postal_code = $request->input('postal_code');
        $store->prefecture = $request->input('prefecture_id');
        // $store->prefecture = 1;
        $store->address1= $request->input('address1');
        $store->address2 = $request->input('address2');
        $store->tel = $request->input('tel');
        $store->photo = $request->input('photo');
        $store->user_id = $user_id;
        // dd( $store);
        // dd($request->file('photo'));
        // $dir = 'photos';

        $store->save();

        // Storage::putFile('',$request->file('photo'));

        // $request->file('photo')->store('public');

        return view('stores.storeComplete'); 
    }

      // only()の引数内のメソッドはログイン時のみ有効
    // public function construct()
    // {
    //     $this->middleware(['auth', 'verified'])->only(['favorite', 'unfavorite']);
    // }

    // public function toggleFavorite($id)
    // {
    //   Favorite::create([
    //     'store_id' => $id,
    //     'user_id' => Auth::id(),
    //   ]);
  
    //   session()->flash('success', 'You favorite the Reply.');
  
    //   return redirect()->back();
    // }

    // public function toggleUnFavorite($id)
    // {
    //   $favorite = Favorite::where('store_id', $id)->where('user_id', Auth::id())->first();
    //   $favorite->delete();
  
    //   session()->flash('success', 'You Unfavorite the Reply.');
  
    //   return redirect()->back();
    // }
    
    public function toggleFavorite($id)
    {
        $store = Store::find($id);
    
        if (!$store) {
            abort(404); // もし $store が null なら 404 エラーを返す
        }
    
        $user = Auth::user();
    
        if ($store->is_favorite_by_user($user)) {
            // お気に入り解除
            $store->favorites()->where('user_id', $user->id)->delete();
            session()->flash('success', 'お気に入り解除しました。');
        } else {
            // お気に入り登録
            $store->favorites()->create(['user_id' => $user->id]);
            session()->flash('success', 'お気に入り登録しました。');
        }
    
        return redirect()->back();
    }
    
}


