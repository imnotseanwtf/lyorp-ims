<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    /** @use HasFactory<\Database\Factories\ReportFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'folder_id', // Assuming this is the foreign key for Folder
        'activity_request_id',
        'content',
        'file',
        'seminars_and_activities_conducted',
        'seminars_and_activities_attended',
        'recruitment',
        'meeting_conducted',
        'status',
        'is_notif',
        'status_report',
        'reason'
    ];

    protected $dates = ['created_at'];
    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function activityRequest(): BelongsTo
    {
        return $this->belongsTo(ActivityRequest::class);
    }
}
