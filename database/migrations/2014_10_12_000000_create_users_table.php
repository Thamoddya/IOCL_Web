<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->unique('iocl_id');
            $table->string('firstName', 45)->nullable();
            $table->string('lastName', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('mobile_no', 10)->nullable();
            $table->string('password')->nullable();
            $table->text('remember_token')->nullable();
            $table->integer('password_reset_code')->nullable();
            $table->text('profile_pic_path')->nullable();
            $table->integer('login_attempt')->default(0);
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('status_id')
                ->references('status_id')
                ->on('status')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('status_id', 'fk_users_status1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
