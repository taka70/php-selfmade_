<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Contracts\Auth\Authenticatable;

class User extends Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    public $timestamps = false;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'password',
        'name',
        'kana',
        'role',
        'tel'
        // 'del_flg',
        // 'deleted_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function folders()
    // {
    //     return $this->hasMany('App\Models\Folder');
    // }

    // $user = User::create([
    //     'email' => $request->input('email'),
    //     'name' => $request->input('name'),
    //     'kana' => $request->input('kana'),
    //     'password' => bcrypt($request->input('password')),
    //     'role' => ($userType === 'admin') ? 0 : (($userType === 'storeStaff') ? 2 : 1),
    //     'tel' => $request->input('tel'),
    // ]);

    // protected $attributes = [
    //     'password' => 'bcrypt:your_plain_text_password',
    // ];

    // protected $table = 'prefectures';
    // protected $primaryKey = 'id';
    // protected $fillable = [
    //     'name',
    // ];

    // //編集画面への表示内容検索
    // public function show($id){
    //     $user = User::find($id); 

    //     // データが存在する場合は、詳細ビューにデータを渡して表示する
    //     return view('contacts.detail', ['user' => $user]);
    // }

    // public function customUpdateMethod($id, $data)
    // {
    //     $user = User::findOrFail($id);
    //     $user->update($data);
    //     return $user;
    // }

 }
