<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolVenueFacility extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'school_venue_id',
    ];

    public function schoolVenue()
    {
    	return $this->belongsTo(SchoolVenue::class, 'school_venue_id');
    }

}
