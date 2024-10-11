<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityRequest extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityRequestFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'file',
        'status',
        'user_id'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
