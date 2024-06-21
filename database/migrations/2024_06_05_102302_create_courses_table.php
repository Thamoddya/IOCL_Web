<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->text('course_no')->nullable();
            $table->integer('student_count')->default(0)->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('image_path')->nullable();
            $table->double('price')->nullable();
            $table->double('total_price')->nullable();
            $table->date('expire_date')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('status_id')
                ->references('status_id')
                ->on('status')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('instructor_id')
                ->references('instructor_id')
                ->on('instructors')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('category_id')
                ->references('category_id')
                ->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('status_id', 'fk_courses_status1_idx');
            $table->index('instructor_id', 'fk_courses_lecturers1_idx');
            $table->index('category_id', 'fk_courses_categories1_idx');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
