<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StudentCadet extends Model
{
    /** @use HasFactory<\Database\Factories\StudentCadetFactory> */
    use HasFactory;

    protected $fillable = [
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'complexion',
        'blood_type',
        'sex'
    ];

    public function birthDetails(): BelongsTo
    {
        return $this->belongsTo(BirthDetails::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function parentalFigures(): HasMany
    {
        return $this->hasMany(ParentalFigure::class);
    }
}
