<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressUpdate extends Model
{
    /** @use HasFactory<\Database\Factories\ProgressUpdateFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'activity_request_id',
        'progress_update',
        'file',
    ];

    public function activityRequest()
    {
        return $this->belongsTo(ActivityRequest::class);
    }
}
