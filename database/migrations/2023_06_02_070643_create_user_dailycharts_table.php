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
        Schema::create('user_dailycharts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id')->nullable();
            $table->bigInteger('user_visit_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->longText('daily_notes')->nullable();
            $table->longText('precaution_medicine')->nullable();
            $table->date('date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->bigInteger('therapy_id')->nullable();
            $table->bigInteger('doctor_id')->nullable();
            $table->bigInteger('intern_id')->nullable();
            $table->bigInteger('therapist_id')->nullable();
            $table->bigInteger('venue_id')->nullable();
            $table->enum('is_cancel', ['0','1'])->default('0');
            $table->enum('status', ['0','1'])->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dailycharts');
    }
};
