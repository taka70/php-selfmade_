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


class StoreController extends Controller
{

    /**
     * 新規店舗登録画面の表示
     */
    public function showStoreRegister():View
    {
        return view('stores.storeRegister'); 
    }

    // public function index(){

    // 	return view('index');
    // }

    public function showStoreConfirm(Request $request)
    {
    
        // バリデーションを実行
        $validatedData = $request->validate([
            'name' => 'required|max:10',
            'postal_code' => 'required|regex:/^[0-9]*$/',
            'prefecture' => 'required|max:10',
            'address1' => 'required|max:20',
            'address2' => 'required|max:20',
            'email' => 'nullable|email',
            'tel' => 'required|regex:/^[0-9]*$/',
            'file' => 'nullable',

        ]);
        // dd($request->file('file'));

        $inputs = $request->all();
    
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

        // // 入力内容をデータベースに保存
        // $store = new Store();

        // $store->name = $request->input('name');
        // $store->postal_code = $request->input('postal_code');
        // $store->prefecture = $request->input('prefecture');
        // $store->address1= $request->input('address1');
        // $store->address2 = $request->input('address2');
        // $store->email = $request->input('email');
        // $store->tel = $request->input('tel');
        // $store->file = $request->input('file');
       
        // $store->save();

        $request->file('file')->store('');

        return view('stores.storeComplete'); 
    }

}


