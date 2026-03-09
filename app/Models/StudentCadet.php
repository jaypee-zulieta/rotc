<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCadet extends Model
{
    /** @use HasFactory<\Database\Factories\StudentCadetFactory> */
    use HasFactory;

    public function birthPlace()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
