<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClosure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','school_id','date','closure_type'
    ];
}