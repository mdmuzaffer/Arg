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
        Schema::create('case_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('user_visit_id')->nullable();
            $table->bigInteger('doctor_id')->nullable();
            $table->bigInteger('ipsection_id')->nullable();
            $table->text('chief_complaints')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('final_diagnosis')->nullable();
            $table->date('date');
            $table->enum('status', ['0','1'])->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_details');
    }
};
