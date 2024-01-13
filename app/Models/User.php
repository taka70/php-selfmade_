<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'name',
        'kana',
        'password',
        'role',
        'tel',
        // 'del_flg',
        // 'deleted_at'
    ];

    protected $table = 'prefectures';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

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
