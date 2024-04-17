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
        Schema::create('courses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('course_name', 255)->nullable();
            $table->string('course_abbreviation', 255)->nullable();
            $table->decimal('course_full_price', 10)->nullable();
            $table->decimal('course_sale_price', 10)->nullable();
            $table->decimal('class_full_price', 10)->nullable();
            $table->integer('course_age')->nullable();
            $table->string('course_remarks', 255)->nullable();
            $table->string('course_color', 255)->nullable();
            $table->integer('course_level')->nullable();
            $table->integer('school_id')->nullable();
            $table->string('course_status', 255)->nullable();
            $table->string('course_term', 255)->nullable();
            $table->string('course_size', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
