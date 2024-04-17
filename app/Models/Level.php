<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'default_price',
        'abbreviation',
        'age',
        'color',
        'remarks',
        'status',
    ];

    /**
     * Characteristics of Level
     * Note: it's called course_level_characteristics on the database
     */
    public function levelCharacteristics()
    {
    	return $this->hasMany(CourseLevelCharacteristic::class, 'course_level_id', 'id');
    }
}
