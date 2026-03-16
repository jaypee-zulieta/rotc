<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'unit_number',
        'street_name',
        'purok',
        'barangay',
        'municipality_or_city',
        'province',
        'zip_code'
    ];

    public function studentCadetsBornHere(): HasManyThrough
    {
        return $this->hasManyThrough(StudentCadet::class, BirthDetails::class);
    }
}
