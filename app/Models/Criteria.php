<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function evaluationAssignToAnswers(): HasMany
    {
        return $this->hasMany(EvaluationAssignToAnswer::class);
    }
}
