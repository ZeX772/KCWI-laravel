<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siblings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sibling_id',
        'student_id',
    ];

    public function sibling()
    {
        return $this->belongsTo(User::class, 'sibling_id');
    }
}
