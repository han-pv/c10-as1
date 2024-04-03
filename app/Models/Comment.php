<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
//        'user_id',
//        'post_id',
        'content',
//        'like_count',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function comments_Post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function comments_User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
