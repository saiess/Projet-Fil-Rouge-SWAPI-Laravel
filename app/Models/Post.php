<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


//    public function user()
//    {
//        return $this->belongsTo(Post::class);
//    }

    protected $fillable = [
        'image',
        'title',
        'description',
        'user_id',
        'categorie_id',
    ];
}
