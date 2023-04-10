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
        Schema::create('flight', function (Blueprint $table) {
            $table->id();
            $table->string('flight_code', 45);
            $table->dateTime('time_table');
            $table->foreignId('fk_pilot')->constrained('pilot');
            $table->foreignId('fk_airplane')->constrained('airplane');
            $table->foreignId('fk_departure_airport')->constrained('airport');
            $table->foreignId('fk_arrival_airport')->constrained('airport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight');
    }
};
