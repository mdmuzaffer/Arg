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
            $table->string('diastolic_pressure')->after('respiratory_rate');
            $table->string('bhramari_time')->after('diastolic_pressure');
            $table->string('remarks')->after('bhramari_time');
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
