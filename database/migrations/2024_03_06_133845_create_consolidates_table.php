<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolidates', function (Blueprint $table) {
            $table->id();
            $table->string('consolidate_no');
            $table->string('type')->default('invoice')->comment('invoice, receipt');
            $table->dateTime('date')->comment('Date to pay');
            $table->unsignedBigInteger('user_id')->nullable()->comment('user whose going to pay');
            $table->decimal('total_amount', 10)->nullable();
            $table->decimal('paid_amount', 10)->nullable();
            $table->decimal('refunded_amount', 10)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->nullable()->comment('pending, success, failed, refunded, cancelled, archived');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consolidates');
    }
};
