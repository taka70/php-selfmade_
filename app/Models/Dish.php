<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Dish extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $table = 'dishes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'price',
        'country_id',
        'reasonable',
        'painfulness',
        'local_taste',
        'dish_text',
        'store_id',
        'photo',
    ];

    // public function customUpdateMethod($id, $data)
    // {
    // $store = Store::findOrFail($id);
    // $store->update($data);
    // return $store;
    // }
    // protected $table = 'dishes';
    // protected $primaryKey = 'id';
    // protected $fillable = [
    //     'name',
    //     'price',
    //     'store_id',
    //     'country_id',
    //     'reasonable',
    //     'painfulness',
    //     'local_taste',
    //     'user_id',
    //     'dish_text',
    //     'photo',
    // ];

}
