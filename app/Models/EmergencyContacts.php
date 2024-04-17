<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContacts extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'emergency_contact',
        'emergency_contact_name',
        'emergency_contact_relationship',
        // 'verification_code',
        // 'verified',
        // 'trial_ends_at',
    ];
}
