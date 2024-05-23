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
        Schema::create('app_icones', function (Blueprint $table) {
            $table->id();
            $table->string('app_type');
            $table->string('app_title');
            $table->string('app_description');
            $table->string('app_icone');
            $table->string('reference_id')->nullable();
            $table->integer('apptype')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_icones');
    }
};
