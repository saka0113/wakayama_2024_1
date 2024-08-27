<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(Article::class, 'favorites', 'user_id', 'article_id')->withTimestamps();
    }

    public function favorite($articleId)
    {
        $exist = $this->is_favorite($articleId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($articleId);
            return true;
        }
    }

    public function unfavorite($articleId)
    {
        $exist = $this->is_favorite($articleId);

        if($exist){
            $this->favorites()->detach($articleId);
            return true;
        }else{
            return false;
        }
    }

    public function is_favorite($articleId)
    {
        return $this->favorites()->where('article_id',$articleId)->exists();
    }
}
