<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrganizationMember extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationMemberFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'contact_information',
        'email',
        'address'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
