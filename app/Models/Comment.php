<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'update_at',
        'delete_at'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
 
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
