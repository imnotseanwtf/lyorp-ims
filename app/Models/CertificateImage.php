<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateImage extends Model
{
    /** @use HasFactory<\Database\Factories\CertificateImageFactory> */
    use HasFactory;

    protected $fillable = [
        'left_logo',           // Field for Left Logo
        'right_logo',          // Field for Right Logo
        'left_signiture',      // Field for Left Signature
        'right_signiture',     // Field for Right Signature
        'middle_signiture',    // Field for Middle Signature
        'left_name',           // Field for Left Name
        'middle_name',         // Field for Middle Name
        'right_name',          // Field for Right Name
    ];
}
