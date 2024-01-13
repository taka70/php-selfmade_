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
            'number' => 'nullable|regex:/^[0-9]*$/',
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

        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->kana = $request->input('kana');
        $user->password = $request->input('password');
        $userType = $request->input('userType'); // userTypeの値を一度変数に保存する

        // dd($userType);
        if ($userType === 'admin') {
            $user->role = 0; // 管理者の場合、roleを0に設定
        } elseif ($userType === 'storeStaff') {
            $user->role = 2; // 店舗スタッフの場合、roleを2に設定
        } else {
            $user->role = 1; // 会員の場合、roleを1に設定
        }
        
        $user->tel = $request->input('tel');
        
        // dd($user);

        $user->save();

        return view('users.userComplete',['user' => $user]); 
    }

    // public function login(Request $request) 
    // {
    //     $credentials = $request->only('email','password');
    //     // dd($credentials);
    //     if (Auth::attempt($credentials)) {
    //         // $request->session()->regenerate();
    //         // 認証成功時の処理
    //         $user = Auth::user();
    //         // $user にはログインしたユーザーの情報が含まれる
    //         return redirect() -> route('index')->with('loginSuccess', 'ログイン成功しました。');
    //     }

    //     return back()->withErrors([
    //         'loginError' => 'メールアドレスかパスワードが間違っています。',
    //     ]);
    // }

    // // /**
    // //  * ユーザーをアプリケーションからログアウトさせる
    // //  */
    // // public function logout(Request $request): RedirectResponse
    // // {
    // //     Auth::logout();
    
    // //     $request->session()->invalidate();
    
    // //     $request->session()->regenerateToken();
    
    // //     return redirect() -> route('showLogin')->with('logout-success', 'ログアウトしました。');
    // // }


    // // public function login(Request $request) 
    // // {
    // //     $validatedData = $request->validated();
    
    // //     $user = User::where('email', $validatedData['email'])->first();
    
    // //     if ($user && Hash::check($validatedData['password'], $user->password)) {
    // //         Auth::login($user);
    
    // //         return redirect()->route('index')->with('login_success', 'ログイン成功しました。');
    // //     }
    
    // //     return back()->withErrors([
    // //         'loginError' => 'メールアドレスかパスワードが間違っています。',
    // //     ]);
    // // }

    // // public function login(Request $request) 
    // // {
    // //     // フォームリクエストでバリデーションを行った後に、認証情報を取得
    // //     $validatedData = $request->validated();
        
    // //     // デバッグログの出力：認証情報をログに表示
    // //     \Illuminate\Support\Facades\Log::info('Auth attempt called with: ', $validatedData);
        
    // //     // 認証情報を使って認証を試みる
    // //     if (Auth::attempt($validatedData)) {
    // //         // 認証成功時の処理
    // //         $request->session()->regenerate();

    // //         return redirect()->route('index')->with('login_success', 'ログイン成功しました。');
    // //     }

    // //     return back()->withErrors([
    // //         'loginError' => 'メールアドレスかパスワードが間違っています。',
    // //     ]);
    // // }


    // public function logout(Request $request) 
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    
    //     return redirect()->route('showLogin')->with('logout', 'ログアウトしました。');
    // }

    // // public function profile()
    // // {
    // //     return view('profile');
    // // }
    // // public function index(): View|RedirectResponse
    // // {
    // //     // ログインしているユーザー情報を取得
    // //     $user = Auth::user();

    // //     // ユーザーがログインしているかどうかをチェック
    // //     if ($user) {
    // //         /**
    // //          * 選手一覧画面の表示
    // //          */
    // //         $playerTable = new Player;

    // //         // del_flg が 0 の選手データを取得
    // //         $players = Player::where('del_flg', 0)->paginate(20); // 10件ずつページネーションする例

    // //         return view('players.index', ['players' => $players, 'user' => $user]);
    // //     } else {
    // //         // ユーザーがログインしていない場合の処理
    // //         // ログイン画面などにリダイレクトするか、エラーメッセージを表示するなど適切な処理を行う
    // //         return redirect()->route('showLogin')->with('error', 'ログインしてください');
    // //     }
    // // }

        /**
     * 新規ユーザー編集画面の表示
     */
    public function showUserUpdate():View
    {
        // $userTable = new User;
        // $users = User::all();

        // return view('users.account', compact('users')); 
        return view('users.userUpdate'); 
    }

    /**
     * 新規ユーザー編集情報確認画面の表示
     */
    public function showUserUpdateConfirm(Request $request)
    {
        // バリデーションを実行
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:10',
            'kana' => 'required|max:10',
            'password' => 'required|min:6|confirmed',
            'userType' => 'required',
            'number' => 'nullable|regex:/^[0-9]*$/',
        ]);

        // フォームからの入力値を全て取得
        $inputs = $request->all();
        
        return view('users.userUpdateConfirm', ['inputs' => $inputs]);        
    }

    /**
     * 新規ユーザー編集完了画面の表示
     */
    public function showUserUpdateComplete(Request $request)
    {
        // 戻るボタンをクリックされた場合
        if($request->input('back') == 'back'){
            return redirect('/userUpdateConfirm')->withInput();
        }

        // 入力内容をデータベースに保存
        $user = new User();

        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->kana = $request->input('kana');
        $user->password = $request->input('password');
        $userType = $request->input('userType'); // userTypeの値を一度変数に保存する

        // dd($userType);
        if ($userType === 'admin') {
            $user->role = 0; // 管理者の場合、roleを0に設定
        } elseif ($userType === 'storeStaff') {
            $user->role = 2; // 店舗スタッフの場合、roleを2に設定
        } else {
            $user->role = 1; // 会員の場合、roleを1に設定
        }
        
        $user->tel = $request->input('tel');
        
        // dd($user);

        $user->save();

        return view('users.userUpdateComplete',['user' => $user]); 
    }

}

