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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email',50)->nullable()->unique();
            $table->string('mobile_no', 15)->nullable()->unique();
            $table->string('password');
            $table->bigInteger('role')->default(0);
            $table->bigInteger('social_account_enabled')->nullable();
            $table->enum('status', ['0','1','2','3'])->default(0); // 0: new, 1: active, 2: inactive, 3:discharge
            $table->enum('is_active', ['0','1'])->default(0);
            $table->enum('profile_complete', ['0','1'])->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
