<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BirthDetails extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date_of_birth',
        'address_id',
        'student_cadet_id'
    ];


    public function studentCadet(): HasOne
    {
        return $this->hasOne(StudentCadet::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
