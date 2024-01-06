<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact; 
use DB;

class ContactController extends Controller
{
    /**
     * お問い合わせフォーム画面の表示
     */
    public function showContact():View
    {

        // $name_value = '山田太郎'; 


        $contactTable = new Contact;
        $contacts = Contact::all();
        
        // dd($contacts);
        return view('contacts.contact', compact('contacts'));

        // return view('contacts.contact'); 
    }

    /**
     * 確認画面の表示
     */

    public function showConfirm(Request $request)
    {
        // バリデーションを実行
        $validatedData = $request->validate([
            'name' => 'required|max:10',
            'kana' => 'required|max:10', // 必須入力かつ10文字以内
            'mail' => 'required|email',
            'number' => 'nullable|regex:/^[0-9]*$/',
            'body' => 'required',
        ]);    

        // フォームからの入力値を全て取得
        $inputs = $request->all();

        // 問題がなければ入力内容確認ページのviewに変数を渡して表示
        return view('contacts.confirm', ['inputs' => $inputs]);

    }  

    /**
     * 完了画面の表示
     */
    public function showComplete(Request $request)
    {

        // 戻るボタンをクリックされた場合
        if($request->input('back') == 'back'){
        return redirect('/contacts/contact')->withInput();
        }

        $contact = new Contact();
        // 入力内容をデータベースに保存
        $contact->name = $request->input('name');
        $contact->kana = $request->input('kana');
        $contact->tel = $request->input('number');
        $contact->email = $request->input('mail');
        $contact->body = $request->input('body');

        $contact->save();

        return view('contacts.complete',
        [
            'contact' => $contact,
        ]);
    }


    /**
     * 編集画面の表示
     */
    public function showUpdate($id)
    {
        $contact = Contact::findOrFail($id); 

        return view('contacts.update_contact', compact('contact'), ['id' => $contact->id]);
    }

    /**
     * 確認画面の表示
     */

    public function showUpdateConfirm(Request $request , $id)
    {

        // バリデーションを実行
        $validatedData = $request->validate([
             'name' => 'required|max:10',
             'kana' => 'required|max:10', // 必須入力かつ10文字以内
             'mail' => 'required|email',
             'number' => 'nullable|regex:/^[0-9]*$/',
             'body' => 'required',
        ]);    
 
        // フォームからの入力値を全て取得
        $inputs = $request->all();

        $contact = Contact::findOrFail($id);

        //  dd($contact->id);
        // 問題がなければ入力内容確認ページのviewに変数を渡して表示
        return view('contacts.update', ['inputs' => $inputs , 'id' => $contact->id]);
 
    }  

    /**
     * 編集処理とお問い合わせフォームへ画面遷移
     */
    public function register(Request $request, $id)
    {

        // 戻るボタンをクリックされた場合
        if($request->input('back') == 'back'){
        return redirect('/contacts/contact')->withInput();
        }
        
        $contact = Contact::findOrFail($id);
        
        // フォームからの入力値を使ってレコードを更新する
        $contact->name = $request->input('name');
        $contact->kana = $request->input('kana');
        $contact->tel = $request->input('number');
        $contact->email = $request->input('mail');
        $contact->body = $request->input('body');
        
        // 更新内容を保存する
        $contact->save();

        // dd($contact);
        return redirect()->route('showContact', ['id' => $contact->id])
            ->with('success', 'お問い合わせ内容を更新しました');
    }

       
    /**
     * 削除処理
     */
    public function softDelete($id)
    {
        // 削除対象レコードを検索
        $contact = Contact::find($id);
    
        if ($contact) {
            // $contact->save();
            // $contact->refresh();
            $contact->delete();
            $contacts = Contact::all(); // コンタクト一覧を取得

            return view('contacts.contact', ['contacts' => $contacts]);
            // return view('contacts.contact'); // リダイレクト先を指定
        } else {
            return response()->json(['message' => '削除に失敗しました'], 404);
        }
    }
}

