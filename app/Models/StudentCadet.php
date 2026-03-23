<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class StudentCadet extends Model
{
    /** @use HasFactory<\Database\Factories\StudentCadetFactory> */
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'complexion',
        'blood_type',
        'sex',
        'birth_details_id'
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

    public function toSearchableArray()
    {
        return [
            'student_number' => $this->student_number,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'suffix' => $this->suffix,
            'complexion' => $this->complexion,
            'blood_type' => $this->blood_type,
            'sex' => $this->sex
        ];
    }
}
