<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Spice extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $table = 'spices';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'effect',
        'subject',
        'habitat',
        'part',
        'alias',
        'characteristic',
        'photo',
    ];
}
