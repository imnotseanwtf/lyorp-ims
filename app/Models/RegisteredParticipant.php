<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegisteredParticipant extends Model
{
    /** @use HasFactory<\Database\Factories\RegisteredParticipantFactory> */
    use HasFactory;

    protected $fillable = [
        'activity_request_id',
        'name',
        'age', 
        'gender',
        'barangay',
        'name_of_organization'
    ];

    public function activityRequest(): BelongsTo
    {
        return $this->belongsTo(ActivityRequest::class);
    }
}
