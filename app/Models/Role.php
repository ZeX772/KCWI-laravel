<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Define the inverse relationship to users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
