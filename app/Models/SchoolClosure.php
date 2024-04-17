<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClosure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reason',
        'closure_type',
        'venue',
        'facility',
        'start_date',
        'end_date',
        'year',
        'start_time',
        'end_time',
        'is_whole_day',
        'remarks'
    ];

    public function venue()
    {
    	return $this->hasOne(SchoolVenue::class, 'id', 'venue');
    }

    public function facility()
    {
    	return $this->hasOne(SchoolVenueFacility::class, 'id', 'facility');
    }

    public function closureTypes()
    {
    	return $this->hasOne(ClosureType::class, 'id', 'closure_type');
    }

    public function closureReason()
    {
    	return $this->hasOne(ClosureReason::class, 'id', 'reason');
    }
}
