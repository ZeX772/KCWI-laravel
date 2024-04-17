<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles_table extends Model{

    protected $table = "roles_table";
    
    //custom primary key
    protected $primaryKey = 'role_id';


    protected $fillable = [
        'role_name'
    ];

    //Define the relationship with "users_table"
    public function users(){
        //a role can have multiple uesrs
        return $this->hasMany(UsersTable::class, 'role_id', 'role_id');
    }

}