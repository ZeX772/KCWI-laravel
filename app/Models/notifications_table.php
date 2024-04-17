<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notifications_table extends Model{

    //specify the table name
    protected $table = 'notifications_table';

    //custom primary key
    protected $primaryKey = 'notification_id';

    protected $fillable = [
        'notification_title',
        'notification_content'
    ];

    //notification_table.php (model file)
    //Define the many-to-many relationship with users
    public function users(){

        //each notifications belongs to multiple users
        return $this->belongsToMany(users_table::class, 'users_notifications_table', 'notification_id', 'id');

    }
    




}