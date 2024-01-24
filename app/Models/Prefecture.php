<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $table = 'prefectures';
    
    public function getPrefectureName()
    {
        $prefectures = Prefecture::find($this->prefecture_id)->name;
        return $prefectures;
        
    }

}

