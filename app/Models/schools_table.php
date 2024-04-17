<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class schools_table extends Model{

    //specify the table name
    protected $table = "schools_table";

    //custom primary key
    protected $primaryKey = 'school_id';

    protected $fillable = [
        'school_name'
    ];

    //define the relationship with "users_table"
    public function users(){
        //a school can have multiple users
        return $this->hasMany(UsersTable::class, 'school_id', 'school_id');
    }

}