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
        Schema::create('school_closures', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 255)->nullable();
            $table->integer('school_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('closure_type')->nullable();
            $table->timestamps();
            $table->enum('repeat', ['daily', 'monthly', 'yearly', 'none'])->nullable();
            $table->time('from_time')->nullable();
            $table->time('to_time')->nullable();
            $table->enum('status', ['active', 'archive'])->nullable()->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_closures');
    }
};
