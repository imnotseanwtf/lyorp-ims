<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Folder extends Model
{
    /** @use HasFactory<\Database\Factories\FolderFactory> */
    use HasFactory;


    protected $fillable = [
        'year',
        'user_id',
        'name'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}