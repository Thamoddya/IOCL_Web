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
        Schema::create('student_enrolled_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('enrollment_date')->nullable();
            $table->unsignedBigInteger('transaction_id');
            $table->integer('completed')->default(0)->nullable();
            $table->enum('status', ['Active', 'Completed', 'Cancelled'])->nullable();
            $table->timestamps();

            $table->foreign('course_id')
                ->references('course_id')
                ->on('courses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('transaction_id')
                ->references('transaction_id')
                ->on('transactions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('course_id', 'fk_student_enrolled_courses_courses1_idx');
            $table->index('user_id', 'fk_student_enrolled_courses_users1_idx');
            $table->index('transaction_id', 'fk_student_enrolled_courses_transactions1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_enrolled_courses');
    }
};
