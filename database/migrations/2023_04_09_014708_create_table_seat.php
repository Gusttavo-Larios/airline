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
        Schema::create('seat', function (Blueprint $table) {
            $table->id();
            $table->string('seat_code', 20);
            $table->foreignId('fk_class')->constrained('class');
            $table->foreignId('fk_airplane')->constrained('airplane');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat');
    }
};
