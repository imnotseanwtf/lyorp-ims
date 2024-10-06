<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'name_of_the_primary_representative',
        'facebook_url',
        'phone_number',
        'age',
        'sex',
        'duty_accomplished_registration_form',
        'list_of_officers_and_adviser',
        'list_of_member_in_good_standing',
        'constitution_and_by_laws',
        'endorsement_certification_from_proper_authority',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function evaluationAssignToAnswers(): HasMany
    {
        return $this->hasMany(EvaluationAssignToAnswer::class);
    }

    public function isOrganization()
    {
        return $this->hasRole('organization');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
