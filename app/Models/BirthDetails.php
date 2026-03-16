<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BirthDetails extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'date_of_birth',
        'address_id',
        'student_cadet_id'
    ];


    public function studentCadet(): BelongsTo
    {
        return $this->belongsTo(StudentCadet::class);
    }

    public function birthPlace(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
