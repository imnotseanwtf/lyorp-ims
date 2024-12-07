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
        'title',
        'content',
        'file',
        'seminars_and_activities_conducted',
        'seminars_and_activities_attended',
        'recruitment',
        'meeting_conducted',
        'others',
        'status',
        'is_notif',
        'status_report',
        'reason'
    ];
    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
