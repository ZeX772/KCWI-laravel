<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Wave\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name',
        // 'email',
        // 'username',
        // 'password',
        // 'verification_code',
        // 'verified',
        // 'trial_ends_at',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
    ];

    protected $appends = [
        'full_name'
    ];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function isCMS()
    {
        return in_array($this->role->name, config('auth.roles.cms'));
    }

    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function coachDetails()
    {
        return $this->hasOne(CoachDetail::class, 'user_id');
    }

    public function coachAvailability()
    {
        return $this->hasMany(CoachAvailability::class, 'user_id');
    }

    public function coachBankDetails()
    {
        return $this->hasMany(CoachBankDetail::class, 'user_id');
    }

    public function student_information()
    {
        return $this->hasOne(StudentInformation::class, 'student_id');
    }

    public function guardians()
    {
        return $this->hasMany(Guardian::class, 'student_id');
    }

    public function siblings()
    {
        return $this->hasMany(Siblings::class, 'student_id');
    }

    public function emergencyContacts()
    {
        return $this->hasMany(EmergencyContacts::class, 'user_id');
    }
}
