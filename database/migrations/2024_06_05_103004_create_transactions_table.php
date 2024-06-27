<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->text('order_id')->nullable();
            $table->string('transactions', 45)->nullable();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->double('total_paid')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_status_id');
            $table->text('payment_gateway_response')->nullable();
            $table->timestamps();

            $table->foreign('course_id')
                ->references('course_id')
                ->on('courses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('payment_method_id')
                ->references('payment_method_id')
                ->on('transaction_methods')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('payment_status_id')
                ->references('payment_status_id')
                ->on('payment_statuses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('course_id', 'fk_transactions_courses1_idx');
            $table->index('payment_method_id', 'fk_transactions_transaction_method1_idx');
            $table->index('user_id', 'fk_transactions_users1_idx');
            $table->index('payment_status_id', 'fk_transactions_payment_status1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
