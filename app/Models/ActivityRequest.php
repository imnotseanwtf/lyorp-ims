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
        'activity_name',
        'date',
        'time',
        'venue',
        'specific_objectives',
        'specific_outputs',
        'topics',
        'equipment',
        'status',
        'file',
        'user_id',
        'is_notif',
        'audience',
        'others',
        'expected_number_of_participants',
        'others_equipment',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
