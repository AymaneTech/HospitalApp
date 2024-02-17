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
            $table->string("time")->default(null);
            $table->string("status")->default("pending");
            $table->boolean("is_urgent")->default(false);
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
