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


class TopController extends Controller
{
    /**
     * Top画面の表示
     */
    public function showTopPage():View
    {
    // ログインしているユーザー情報を取得
    // $user = Auth::user();


    return view('Top.topPage');
        //return view('Top.topPage', compact('user')); 
    }





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


