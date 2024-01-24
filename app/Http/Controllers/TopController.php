<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TopController extends Controller
{

    
    public function rule()
    {
        return ([
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    // /**
    //  * ユーザーをリダイレクトするパスの取得
    //  */
    // protected function redirectTo(Request $request): string
    // {
    //     return route('login');
    // }

    // //ログイン処理
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt([
    //         $user = Auth::user(),
    //         fn (Builder $query) => $query->has('activeSubscription'),
    //     ])) {
    //         // 認証に成功した
    //     }

    //     return back()->withErrors([
    //         'loginError' => 'メールアドレスかパスワードが間違っています。',
    //     ])->onlyInput('email');
    // }
    // function bcrypt($value, $options = [])
    // {
    //     return app('hash')->driver('bcrypt')->make($value, $options);
    // }
    
//     public function login(Request $request)
//     {
//         $credentials = $request->validate([
//             'email' => ['required', 'email'],
//             'password' => ['required'],
//         ]);
    
//         if (Auth::attempt($credentials)) {
//             // ログイン成功時の処理
//             return redirect()->route('showTopPage')->with([
//                 'loginSuccess' => 'ログインしました。',
//             ]);
//         }
    
//         // ログイン失敗時の処理
//         throw ValidationException::withMessages([
//             'loginError' => ['メールアドレスかパスワードが間違っています。'],
//         ])->errorBag('login')->redirectTo(route('login'));
//     }
    
//     protected function checkOldPassword($user, $password)
// {
//     // 古いパスワードを確認するためのカスタムロジック
//     // 古いパスワードがどのハッシュアルゴリズムを使用してハッシュ化されていたかに依存します
//     // たとえば、MD5を使用してハッシュ化されていた場合: return md5($password) === $user->old_password;
//     // 'md5'を古いパスワードに使用されていた実際のハッシュアルゴリズムに置き換えてください

//     return md5($password) === $user->old_password; // 実際のロジックに置き換えてください
// }


// // ログイン処理
// public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         // 認証成功時の処理
//         $request->session()->regenerate();
//         // $user にはログインしたユーザーの情報が含まれる

//         // 認証成功時の処理
//         return redirect()->route('showTopPage')->with('loginSuccess', 'ログインしました');
//     } else {
//         // 認証失敗時の処理
//         return back()->with([
//             'loginError' => 'メールアドレスかパスワードが間違っています。',
//         ]);
//     }
// }
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
        // dd($credentials);
    if (Auth::attempt($credentials)) {
        // 認証成功時の処理
        $request->session()->regenerate();

        return redirect()->route('showTopPage')->with([
            'loginSuccess' => 'ログインしました。',
        ]);
    } else {
        // 認証失敗時の処理
        return back()->with([
            'loginError' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }
}




    //ログアウト処理
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('showLogin')->with('logout', 'ログアウトしました。');
    }

    /**
     * Top画面の表示
     */
    public function showTopPage():View
    {

    // ログインしているユーザー情報を取得
        $user = Auth::user();
        // dd($user);
    // return view('Top.topPage');
        return view('Top.topPage', compact('user')); 
    }

    // public function showTopPage(): View
    // {
    //     // ログインしていない場合はログインページにリダイレクト
    //     $this->middleware('auth');
    
    //     // ミドルウェアのタイポを修正し、ユーザー情報を取得
    //     $this->middleware(function ($request, $next) {
    //         $this->user = Auth::user();
    //         return $next($request);
    //     });
    
    //     // ログインしているユーザー情報を取得
    //     $user = Auth::user();
    //     dd($user);  // ユーザー情報のデバッグ出力
    
    //     // ユーザー情報をビューに渡して表示
    //     return view('Top.topPage', compact('user'));
    // }

    // public function index():View
    // {

    //     // ログインしているユーザー情報を取得
    //     $user = Auth::user();
    //     /**
    //      * 選手一覧画面の表示
    //      */
    //     $playerTable = new Player;

    //     // del_flg が 0 の選手データを取得
    //     $players = Player::where('del_flg', 0)->paginate(20); // 10件ずつページネーションする例
    //     dd($user);
    //     return view('players.index', compact('user', 'players'));
        
    // }
}


