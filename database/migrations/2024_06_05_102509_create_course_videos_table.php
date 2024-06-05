<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('video_path');
            $table->text('video_title')->nullable();
            $table->text('video_description')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('course_id')
                ->references('course_id')
                ->on('courses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('status_id')
                ->references('status_id')
                ->on('status')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('course_id', 'fk_course_has_videos_courses1_idx');
            $table->index('status_id', 'fk_course_videos_status1_idx');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('course_videos');
    }
};
