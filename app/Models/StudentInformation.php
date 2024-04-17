<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'profile_img',
        'first_name',
        'last_name',
        'chinese_name',
        'hkid',
        'phone',
        'dob',
        'gender',
        'nationality',
        'address',
        'school_id',
        'grade_of_class',
        'hear_about_us',
        'referral_by',
        'student_level',
        'remarks'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referral_by');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'student_level');
    }
}
