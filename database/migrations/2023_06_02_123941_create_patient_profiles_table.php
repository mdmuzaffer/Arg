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
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('whats_no', 15)->nullable();
            //$table->bigInteger('section_id')->nullable();
            $table->tinyInteger('language_id')->nullable();
            $table->bigInteger('accomudation_id')->nullable();
           // $table->enum('section_status', ['0','1','2'])->default(0);
            //$table->dateTime('section_active_date')->nullable();
            $table->string('address')->nullable();
            $table->text('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('country_id')->nullable();
            $table->bigInteger('age')->nullable();
            $table->bigInteger('gender')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_profiles');
    }
};
