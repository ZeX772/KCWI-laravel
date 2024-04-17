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
        Schema::create('users_courses_table', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users_table')->onDelete('cascade');
    
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('course_id')->on('courses_table')->onDelete('cascade');
            
            $table->timestamps();
    
            // Composite primary Key
            $table->primary(['id', 'course_id']);
        });
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_courses_table');
    }
};
