<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointements', function (Blueprint $table) {
            $table->id();
            $table->foreignId("doctor_id")
                ->constrained("doctors");
            $table->foreignId("patient_id")
                ->constrained("patients");
            $table->date("date");
            $table->enum("time", ["8:00-9:00", "9:00-11:00", "11:00-12:00", "13:00-14:00", "14:00-15:00", "15:00-16:00", "16:00-17:00", "17:00-18:00"]);
            $table->enum("status", ["pending", "cancelled", "completed"]);
            $table->boolean("is_urgent");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointements');
    }
};
