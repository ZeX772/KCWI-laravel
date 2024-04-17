<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachAvailability extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'availability_type',
        'user_id',
        'from_date',
        'to_date',
        'from_time',
        'to_time'
    ];

}
