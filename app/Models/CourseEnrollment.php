<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    protected $table = 'course_enrollments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'package_id',
        'is_paid',
        'status',
    ];

    public function package()
    {
        return $this->belongsTo(CoursePackage::class, 'package_id');
    }
}
