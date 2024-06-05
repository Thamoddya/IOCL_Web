<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->integer('rating')->nullable();
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('course_id')
                ->references('course_id')
                ->on('courses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('user_id', 'fk_feedback_users1_idx');
            $table->index('course_id', 'fk_feedback_courses1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
