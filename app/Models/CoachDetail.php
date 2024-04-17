<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachDetail extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'monthly_rate',
        'profile_img',
        'payment_type',
        'payment_method',
        'hkid',
        'phone',
        'dob',
        'address',
        'start_date',
        'end_date',
        'user_id',
        'remarks',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
