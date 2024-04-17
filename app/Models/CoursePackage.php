<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePackage extends Model
{
    protected $table = 'course_package';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_id',
        'course_type',
        'venue',
        'facility',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function schoolVenue()
    {
        return $this->belongsTo(SchoolVenue::class, 'venue');
    }

    public function schoolVenueFacility()
    {
        return $this->belongsTo(SchoolVenueFacility::class, 'facility');
    }
}
