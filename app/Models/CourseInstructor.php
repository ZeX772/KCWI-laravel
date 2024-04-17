<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseInstructor extends Model
{
	protected $table = 'course_instructor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_id',
        'coach_id',
    ];

    public function coachDetail()
    {
    	return $this->belongsTo(CoachDetail::class, 'coach_id');
    }
}
