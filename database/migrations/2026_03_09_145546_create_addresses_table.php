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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('unit')->nullable();
            $table->string('street_name')->nullable();
            $table->string('purok')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality_or_city');
            $table->string('province');
            $table->string('zip_code');
            $table->string('telephone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
