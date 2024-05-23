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
        Schema::table('user_daily_reports', function (Blueprint $table) {
            $table->string('bmi')->nullable()->after('bhramari_time');
            $table->string('medications')->nullable()->after('bmi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_daily_reports', function (Blueprint $table) {
            //
        });
    }
};
