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
        Schema::create('more_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('setting_id')->nullable();
            $table->string('setting_name')->nullable();
            $table->tinyInteger('setting_type')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->tinyInteger('is_locked')->nullable();
            $table->string('setting_icon')->nullable();
            $table->string('setting_locked_icon')->nullable();
            $table->tinyInteger('sort_order')->nullable();
            $table->string('text_color')->nullable();
            $table->dateTime('creation_datetime')->nullable();
            $table->string('setting_description')->nullable();
            $table->tinyInteger('more_tag_id')->nullable();
            $table->bigInteger('parent_setting_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('more_settings');
    }
};
