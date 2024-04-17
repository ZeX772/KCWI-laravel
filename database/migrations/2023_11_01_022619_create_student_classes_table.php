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
        Schema::create('student_classes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('student_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->tinyInteger('has_attended')->nullable();
            $table->tinyInteger('is_cancelled')->nullable();
            $table->tinyInteger('is_withdrawn')->nullable();
            $table->tinyInteger('is_ended')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_classes');
    }
};
