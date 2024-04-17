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
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id();
            $table->string('course_category_name');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->string('class_size');
            $table->string('age');
            $table->string('duration');
            $table->decimal('cost', 10)->comment('Cost per class');
            $table->string('prerequisite');
            $table->text('remarks');
            $table->string('status');
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
        Schema::dropIfExists('course_categories');
    }
};
