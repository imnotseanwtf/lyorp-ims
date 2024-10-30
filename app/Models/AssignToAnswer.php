<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssignToAnswer extends Model
{
    /** @use HasFactory<\Database\Factories\AssignToAnswerFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'criteria_id',
        'is_answered'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
