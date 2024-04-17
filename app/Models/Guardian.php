<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'guardian_id',
        'student_id',
        'relationship'
    ];

    public function guardian()
    {
        return $this->belongsTo(User::class, 'guardian_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
