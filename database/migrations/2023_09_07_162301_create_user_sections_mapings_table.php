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
        Schema::create('user_sections_mapings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('approved_by')->default(0);
            $table->enum('is_active', ['0','1'])->default(0);
            $table->enum('status', ['0','1','2'])->default(0); // 0:pending, 1:approved, 2:declined. 
            $table->text('declined_reason')->nullable();
            $table->dateTime('section_active_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sections_mapings');
    }
};
