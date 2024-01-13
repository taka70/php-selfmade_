<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


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
        'email',
        'tel',
        'user_id',
        'photo',
    ];

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
