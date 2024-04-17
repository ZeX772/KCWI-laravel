<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLevelCharacteristic extends Model
{
    use HasFactory;

    /**
     * This Model belongs to Level
     */
    public function level()
    {
    	return $this->belongsTo(Level::class, 'course_level_id');
    }
}
