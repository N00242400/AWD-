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
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pet_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
       //fixed set of named constants(enum)//
        $table->enum('appointment_type', ['checkup', 'vaccination', 'surgery', 'grooming'])->nullable();
        $table->text('vet_name')->nullable();
        $table->text('clinic_name')->nullable();
        $table->date('appointment_date');
        $table->text('vet_notes')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
