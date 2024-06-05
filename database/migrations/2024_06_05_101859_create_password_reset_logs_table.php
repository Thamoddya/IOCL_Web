<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('password_reset_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->text('auth_code')->nullable();
            $table->dateTime('created_at')->nullable();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('user_id', 'fk_password_reset_log_users1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('password_reset_logs');
    }
};
