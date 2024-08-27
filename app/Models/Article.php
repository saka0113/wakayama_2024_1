<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "content",
        "image_path",
        "city_id",
        "genre",
        "ninzu",
        "price",
        "feature",
        'comment',
    ];

    public function favorite_users()
    {
        return $this->belongsToMany(User::class,'favorites','article_id','user_id')->withTimestamps();
    }
}
