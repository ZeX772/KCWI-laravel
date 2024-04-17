<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosureReason extends Model
{
    use HasFactory;

    public function closure()
    {
    	return $this->belongsTo(Closure::class, 'reason');
    }
}
