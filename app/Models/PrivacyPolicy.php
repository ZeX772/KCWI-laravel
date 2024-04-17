<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    //specify the table name
    protected $table = 'privacy_policy';

    protected $fillable = [
        'title',
        'content',
    ];
}
