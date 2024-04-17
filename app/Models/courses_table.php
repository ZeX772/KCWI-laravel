<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courses_table extends Model{

    protected $table = "courses_table";
    
    //custom primary key
    protected $primaryKey = 'course_id';


    protected $fillable = [
        'course_name'
    ];

    //courses_table.php (model file)
    //Define the many-to-many relationship with users
    public function users(){
        
        //each courses belongs to multiple users
        return $this->belongsToMany(users_table::class, 'users_courses_table', 'course_id', 'id');
    }

}