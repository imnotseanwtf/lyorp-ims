<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeInformation extends Model
{
    /** @use HasFactory<\Database\Factories\WelcomeInformationFactory> */
    use HasFactory;

    protected $fillable = [
        'address',
        'email',
        'email_two',
        'number',
        'facebook',
    ];
}
