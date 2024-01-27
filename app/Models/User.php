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
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /**
     * ユーザーがお気に入りにした情報を取得
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

 }
