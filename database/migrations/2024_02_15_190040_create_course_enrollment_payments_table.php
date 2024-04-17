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
        Schema::create('course_enrollment_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_enrollment_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('total_fee', 10)->nullable();
            $table->date('payment_date')->nullable();
            $table->text('attachment')->nullable();
            $table->text('remarks')->nullable();
            $table->string('status')->nullable(); // [in progress, paid, archived]
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
        Schema::dropIfExists('course_enrollment_payments');
    }
};
