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
            $table->enum("shift", ["shift_1", "shift_2", "shift_3", "shift_4"]);
            $table->enum("status", ["pending", "cancelled", "completed"]);
            $table->boolean("is_urgent");
            $table->date("booked_at");
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
