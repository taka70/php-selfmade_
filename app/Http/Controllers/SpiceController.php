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
use App\Models\Spice;

class SpiceController extends Controller
{
    /**
     * スパイス画面の表示
     */
    public function showSpice():View
    {

        $spices = Spice::all();

        return view('spices.spice', ['spices' => $spices ]);
    }


    /**
     * スパイス詳細画面の表示
     */
    public function showSpiceDetail($id):View
    {

        $spice = Spice::find($id); 
        // dd($spice);

        // return view('spices.spiceDetail', ['spices' => $spices ]);
        return view('spices.spiceDetail',compact('spice'));
    }

}


