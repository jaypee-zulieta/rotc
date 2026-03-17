<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_cadet_id')->constrained()->onDelete('cascade');
            $table->string('school');
            $table->string('academic_course');
            $table->string('military_course');
            $table->string('religion');
            $table->double('height_m');
            $table->double('weight_kg');
            $table->date('registration_date');
            $table->string('contact_number');
            $table->enum('semester', ['1st Semester', '2nd Semester']);
            $table->string('school_year');
            $table->boolean('is_willing_to_take_advance_course')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
