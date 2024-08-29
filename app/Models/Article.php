<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;


class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "content",
        "image_path",
        "city_id",
        "genre",
        "ninzu",
        "price",
        "feature",
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'article_id', 'user_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
