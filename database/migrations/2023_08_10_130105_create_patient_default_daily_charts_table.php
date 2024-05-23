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
        Schema::create('patient_default_daily_charts', function (Blueprint $table) {
            $table->id();
            $table->longText('therapy_name')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('group_id')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->bigInteger('therapist_id')->default(0);
            $table->bigInteger('section_id')->default(0);
            $table->bigInteger('is_default')->default(0);
            $table->bigInteger('is_language')->default(0);
            $table->string('is_day')->nullable();
            $table->bigInteger('default_venue')->default(0);
            $table->longText('description')->nullable();
            $table->bigInteger('order')->nullable();
            $table->integer('app_type')->default(0);
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
        Schema::dropIfExists('patient_default_daily_charts');
    }
};
