<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'logo',
        'email',
        'invoice_prefix',
        'invoice_number',
        'address',
        'address_line_2',
        'city',
        'state',
        'zip',
        'country',
        'contact_number',
        'school_website',
        'remarks',
        'check_in_time'
    ];
}
