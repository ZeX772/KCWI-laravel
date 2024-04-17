<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_id',
        'course_class_code',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'repeat_type',
        'repeat_on',
        'repeat_end_type',
        'repeat_end_date',
        'repeat_end_occurancy',
        'change_coach',
        'coach_id',
        'change_venue',
        'venue_id',
    ];

    protected $appends = [
        'formated_start_date',
        'formated_start_date_time',
        'formated_end_date',
        'formated_end_date_time',
    ];

    public function getFormatedStartDateAttribute()
    {
        return \Carbon\Carbon::parse($this->start_date)->format('M d, Y');
    }

    public function getFormatedEndDateAttribute()
    {
        return \Carbon\Carbon::parse($this->end_date)->format('M d, Y');
    }

    public function getFormatedStartDateTimeAttribute()
    {
        $startDate = \Carbon\Carbon::parse($this->start_date)->format('M d, Y');
        $startTime = \Carbon\Carbon::parse($this->start_time)->format('h:i A');

        return $startDate . ' - ' . $startTime;
    }

    public function getFormatedEndDateTimeAttribute()
    {
        $endDate = \Carbon\Carbon::parse($this->end_date)->format('M d, Y');
        $endTime = \Carbon\Carbon::parse($this->end_time)->format('h:i A');

        return $endDate . ' - ' . $endTime;
    }

    public function coursePackage()
    {
        return $this->belongsTo(CoursePackage::class, 'package_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
