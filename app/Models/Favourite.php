<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;


    public function favourite()
    {
        return $this->hasMany("App\Models\Favourite", "user_id");
    }

//    public function user()
//    {
//        return $this->belongsTo(Favourite::class);
//    }


    protected $fillable = [
        'post_id',
        'user_id'
    ];
}

