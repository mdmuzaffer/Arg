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
        Schema::create('more_setting_locales', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('more_settings_locale_id')->nullable();
            $table->bigInteger('setting_id')->nullable();
            $table->bigInteger('language_id')->nullable();
            $table->string('setting_name_text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('more_setting_locales');
    }
};
