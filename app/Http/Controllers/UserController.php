<?php

namespace App\Http\Controllers;

// use App\Models\Player;
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

class UserController extends Controller
{
    /**
     * ログイン画面の表示
     */
    public function showLogin():View
    {
        return view('users.login'); 
    }

    public function rule()
    {
        return ([
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * 新規ユーザー登録画面の表示
     */
    public function showAccount():View
    {
        // $userTable = new User;
        // $users = User::all();

        // return view('users.account', compact('users')); 
        return view('users.account'); 
    }

    /**
     * 新規ユーザー登録情報確認画面の表示
     */
    public function showUserConfirm(Request $request)
    {
        // バリデーションを実行
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:10',
            'kana' => 'required|max:10',
            'password' => 'required|min:6|confirmed',
            'userType' => 'required',
            'tel' => 'nullable|regex:/^[0-9]*$/',
        ]);

        // フォームからの入力値を全て取得
        $inputs = $request->all();
        
        return view('users.userConfirm', ['inputs' => $inputs]);        
    }

    /**
     * 新規ユーザー登録完了画面の表示
     */
    public function showUserComplete(Request $request)
    {
        // 戻るボタンをクリックされた場合
        if($request->input('back') == 'back'){
            return redirect('/account')->withInput();
        }

        // 入力内容をデータベースに保存
        $user = new User();
        $inputs = $request->all();

        // dd($request);

        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->kana = $request->input('kana');
        $user->password =  bcrypt($request->input('password'));
        $userType = $request->input('userType'); // userTypeの値を一度変数に保存する

        // dd($user->email);
        // dd($userType);
        if ($userType === 'admin') {
            $user->role = 0; // 管理者の場合、roleを0に設定
        } elseif ($userType === 'storeStaff') {
            $user->role = 2; // 店舗スタッフの場合、roleを2に設定
        } else {
            $user->role = 1; // 会員の場合、roleを1に設定
        }
        
        $user->tel = $request->input('tel');
        
        $user->save();

        return view('users.userComplete',['user' => $user]);
    }

    /**
     * ユーザー変更画面の表示
     */
    public function showUserUpdate($id)
    {
        // $userTable = new User;
        $user = Auth::user($id);
        // dd($user);
        return view('users.userUpdate', compact('user'), ['id' => $id]); 
        // return view('users.userUpdate'); 
    }


    /**
     * ユーザー変更情報確認画面の表示
     */
    public function showUserUpdateConfirm(Request $request, $id)
    {
        // バリデーションを実行
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:10',
            'kana' => 'required|max:10',
            // 'old_password' => 'required|min:6|confirmed',
            'password' => 'required|min:6|confirmed',
            // 'userType' => 'required',
            'tel' => 'nullable|regex:/^[0-9]*$/',
        ]);


        // $userTable = new User;
        $user = Auth::user($id);
        // dd($user);
        // dd($request);
        // $new_password = bcrypt($request->input('password'));
        // $old_password = $request->input('old_password');
        
        // dd($request->old_password);
        // if(!(Hash::check($request->old_password, $user->password))) {
        //     return redirect()->back()->with->with([
        //         'passwordError' => '現在のパスワードが間違っています。',
        //     ]);
        // } 
    
        $enteredPassword = $request->old_password;

        // データベースから取得したハッシュされたパスワード
        $hashedDatabasePassword = $user->password;

        // パスワードを比較
        if (!password_verify($enteredPassword, $hashedDatabasePassword)) {
            return redirect()->back()->with([
                'passwordError' => '現在のパスワードが間違っています。',
            ]);
        } else {
            // 新しいパスワードと現在のパスワードが同じでないことを確認
            $newPassword = $request->password;
            if (password_verify($newPassword, $hashedDatabasePassword)) {
                return redirect()->back()->with([
                    'newPasswordError' => '新しいパスワードが、現在のパスワードと同じです。違うパスワードを設定してください。',
                ]);
            } else {
                // 新しいパスワードをハッシュ化して保存
                $user->password = Hash::make($newPassword);
            }
        }

        $request->session()->regenerate();
        // フォームからの入力値を全て取得
        $inputs = $request->all();
        
        return view('users.userUpdateConfirm',['user' => $user,'inputs' => $inputs,'id' => $id]);        
    }

    /**
     * ユーザー編集完了画面の表示
     */
    public function showUserUpdateComplete(Request $request, $id)
    {
        // 戻るボタンをクリックされた場合
        if($request->input('back') == 'back'){
            return redirect('/userUpdateConfirm')->withInput();
        }

        // 入力内容をデータベースに保存
        // $user = new User();
        $user = User::findOrFail($id);
        $inputs = $request->all();

        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->kana = $request->input('kana');
        $user->password =  bcrypt($request->input('password'));      
        $user->tel = $request->input('tel');
        
        // dd($user);

        $user->save();

        return view('users.userUpdateComplete', ['user' => $user,'id' => $user->id]); 
    }

    /**
     * ユーザー変更画面の表示
     */
    public function showUserIndex():View
    {
        // del_flg が 0 のユーザーデータを取得
        $users = User::where('flg', 0)->paginate(20);
        // dd($user);
        return view('users.userIndex', compact('users'));
        // return view('users.userUpdate'); 
    }

      /**
     * 削除処理
     */
    public function softDelete($id)
    {
        // 削除対象レコードを検索
        $user = User::find($id);
    
        if ($user) {
            $user->flg = 1; // flg を 1 に設定
            $user->save();
            $user->refresh();
            return redirect()->route('showUserIndex'); // リダイレクト先を指定
        } else {
            return response()->json(['message' => '削除に失敗しました'], 404);
        }
    }

    // /**
    //  * お気に入り処理
    //  */
    // public function toggleFavorite($storeId)
    // {
    //     $user = Auth::user();

    //     // すでにお気に入りに登録されているか確認
    //     if ($user->favorites->contains($storeId)) {
    //         // お気に入りから削除
    //         $user->favorites()->detach($storeId);
    //     } else {
    //         // お気に入りに登録
    //         $user->favorites()->attach($storeId);
    //     }

    //     return redirect()->back();
    // }


}

