<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
//        'user_id',
//        'category_id',
        'title',
        'content',
//        'view_count',
//        'like_count',
    ];

    protected $casts = [
//       'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function posts_User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts_Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function Post_comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
