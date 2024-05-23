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
        Schema::create('app_setting_pages', function (Blueprint $table) {
            $table->id();
            $table->string('setting_title')->nullable();
            $table->longText('setting_description')->nullable();
            $table->string('setting_icon')->nullable();
            $table->string('setting_type')->nullable();
            $table->enum('status', ['0','1'])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_setting_pages');
    }
};
