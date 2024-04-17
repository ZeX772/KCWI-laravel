<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_name',
        'course_abbreviation',
        'course_full_price',
        'course_sale_price',
        'class_full_price',
        'course_age',
        'course_remarks',
        'course_color',
        'course_level',
        'school_id',
        'course_status',
        'course_term',
        'course_size',
        'venue',
        'facility',
        'course_type',
        'course_coaches',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'course_level');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function venueData()
    {
        return $this->belongsTo(SchoolVenue::class, 'venue');
    }

    public function venue()
    {
        return $this->belongsTo(SchoolVenue::class, 'venue');
    }

    public function courseClasses()
    {
        return $this->hasMany(CourseClass::class, 'course_id', 'id');
    }

    public function courseType()
    {
        return $this->belongsTo(CourseType::class, 'course_type');
    }

    public function getMaxCode()
    {
        $maxCode = $this->selectRaw('MAX(CAST(SUBSTRING(course_abbreviation, -4) AS UNSIGNED)) as max_code')
                ->value('max_code');

        $maxCode = $maxCode ?? 0;

        $formattedMaxCode = sprintf('%04d', (int)$maxCode + 1);

        return $formattedMaxCode;
    }
}
