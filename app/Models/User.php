<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

//    protected $casts = [
//        'created_at' => 'datetime',
//        'updated_at' => 'datetime',
//    ];


    public function User_posts(): Hasmany
    {
        return $this->hasMany(Post::class);
    }

    public function User_comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
