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
        Schema::create('course_materials', function (Blueprint $table) {
            $table->id('materials_id');
            $table->unsignedBigInteger('course_id');
            $table->string('material_title', 80)->nullable();
            $table->text('material_yt_link')->nullable();
            $table->text('material_doc_path')->nullable();
            $table->unsignedBigInteger('status_id')->default(1);
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

            $table->index('course_id', 'fk_course_materials_courses1_idx');
            $table->index('status_id', 'fk_course_materials_status1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_materials');
    }
};
