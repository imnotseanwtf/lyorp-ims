<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'question_id',
        'evaluation_assign_to_answer_id',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function evaluationAssignToAnswer(): BelongsTo
    {
        return $this->belongsTo(EvaluationAssignToAnswer::class);
    }
}
