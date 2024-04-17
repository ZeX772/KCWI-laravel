<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users_table extends Model{

    //specify the table name
    protected $table = "users_table";

    //do no expect updated_at
    //public $timestamps = false;

    protected $fillable = [
        'role_id',
        'school_id',
        'username',
        'first_name',
        'last_name',
        'chinese_name',

        //newly added
        'hkid',
        'address',
        'nationality',
        'phone',
        'email',
        'dob',
        'remarks',
        'archived'
    ];

    //correct
    //Define the relationship with "roles_table"
    public function roles(){
        //each user belongs to a role
        return $this->belongsTo(roles_table::class, 'role_id', 'role_id');
    }

    //Define the relationship with "schools_table"
    public function schools(){
        //each user belongs to a school
        return $this->belongsTo(schools_table::class, 'school_id', 'school_id');
    }

    //users_table.php (model file)
    //Define the many-to-many relationship with courses
    public function courses(){
        //each users belongs to multiple courses
        return $this->belongsToMany(courses_table::class, 'users_courses_table', 'id', 'course_id');

    }
    
    //users_table.php (model file)
    //Define the many-to-many relationship with notifications
    public function notifications(){
        //each users belongs to multiple notifications
        return $this->belongsToMany(notifications_table::class, 'users_notifications_table', 'id', 'notification_id');

    }



}
