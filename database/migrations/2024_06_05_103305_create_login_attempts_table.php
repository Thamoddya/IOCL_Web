<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('login_attempts', function (Blueprint $table) {
            $table->id('attempt_id');
            $table->dateTime('attempt_time')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->enum('status', ['Success', 'Failure'])->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('user_id', 'fk_login_attempts_users1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_attempts');
    }
};
