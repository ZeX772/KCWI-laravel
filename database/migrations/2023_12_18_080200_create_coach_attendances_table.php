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
        Schema::create('coach_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coach_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('class_id');
            $table->date('signed_date');
            $table->date('cancelled_date')->nullable();
            $table->string('status');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('coach_attendances');
    }
};
