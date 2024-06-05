<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id('instructor_id');
            $table->text('iocl_id')->nullable();
            $table->string('lecturers', 45)->nullable();
            $table->text('name')->nullable();
            $table->text('bio')->nullable();
            $table->string('nic', 15)->nullable();
            $table->string('mobile', 10)->nullable();
            $table->string('email', 45)->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('status_id')
                ->references('status_id')
                ->on('status')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('status_id', 'fk_lecturers_status1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
