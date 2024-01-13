<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Product extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'effect',
        'price',
        'country_id',
        'reasonable',
        'painfulness',
        'local_taste',
        'photo',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function customUpdateMethod($id, $data)
    {
    $product = Product::findOrFail($id);
    $product->update($data);
    return $product;
    }
}
