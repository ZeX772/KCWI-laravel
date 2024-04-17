<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq_Table extends Model{
    
    //specify the table name
    protected $table = 'faq_table';

    
    protected $fillable = [
        'question',
        'answer',
    ];


}
