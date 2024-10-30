<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    /** @use HasFactory<\Database\Factories\AnswerFactory> */
    use HasFactory;

    protected $fillable = [
        'assign_to_answer_id',
        'question_id',
        'answer',
        'is_notif'
    ];

    public function assignToAnswer(): BelongsTo
    {
        return $this->belongsTo(AssignToAnswer::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
