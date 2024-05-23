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
        Schema::create('app_notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sender_id')->nullable();
            $table->bigInteger('receiver_id')->nullable();
            $table->bigInteger('notification_type')->nullable();
            $table->string('notification_title')->nullable();
            $table->string('notification_message')->nullable();
            $table->string('notification_icon')->nullable();
            $table->dateTime('creation_datetime')->nullable();
            $table->enum('is_read', ['0','1'])->default(1);
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
        Schema::dropIfExists('app_notifications');
    }
};
