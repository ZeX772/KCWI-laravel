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
        Schema::create('uprise_payment_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model_type')->comment('course, competition, shopping, other');
            $table->string('payment_id');
            $table->string('payment_type');
            $table->string('status')->default('pending')->comment('pending, approved');
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
        Schema::dropIfExists('uprise_payment_records');
    }
};
