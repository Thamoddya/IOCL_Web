<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->id('student_details_id');
            $table->unsignedBigInteger('user_id');
            $table->string('address_line_1', 45)->nullable();
            $table->string('address_line_2', 45)->nullable();
            $table->string('address_line_3', 45)->nullable();
            $table->unsignedBigInteger('city_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('city_id')
                ->references('city_id')
                ->on('cities')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('user_id', 'fk_student_details_users_idx');
            $table->index('city_id', 'fk_student_details_cities1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
