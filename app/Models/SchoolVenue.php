<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolVenue extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name'
    // ];

    public function schoolVenueFacilities()
    {
    	return $this->hasMany(SchoolVenueFacility::class, 'school_venue_id', 'id');
    }
}
