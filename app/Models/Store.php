<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $table = 'stores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'postal_code',
        'prefecture_id',
        'address1',
        'address2',
        'tel',
        'user_id',
        'photo',
    ];

    public function favorites()
    {
      return $this->hasMany(Favorite::class, 'store_id');
    }

    // public function is_favorite_by_user()
    // {
    //   $id = Auth::id();
  
    //   $favorites = array();
    //   foreach($this->favorites as $favorite) {
    //     array_push($favorites, $favorite->user_id);
    //   }
  
    //   if (in_array($id, $favorites)) {
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    public function is_favorite_by_user()
    {
        // ログインユーザーが null でないことを確認
        if ($user = Auth::user()) {
            $id = $user->id;
        
            $favorites = array();
            foreach ($this->favorites as $favorite) {
                array_push($favorites, $favorite->user_id);
            }
        
            return in_array($id, $favorites);
        }

        return false; // ログインユーザーが null の場合は false を返す
    }

}
