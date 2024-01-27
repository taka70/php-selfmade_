<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Favorite extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $table = 'favorites';
    protected $primaryKey = 'id';
    protected $fillable = ['store_id','user_id'];

    public function store()
    {
      return $this->belongsTo(Store::class);
    }
  
    // public function user()
    // {
    //   return $this->belongsTo(User::class);
    // }
 
}
