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
        Schema::create('course_classes', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->string('course_class_code');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('repeat')->nullable(); // 1,2,3,4
            $table->string('repeat_type')->nullable(); // Days, Weeks, Months, Years
            $table->string('repeat_on')->nullable(); // Sun, Mon, Tue, Wed, Thu, Fri, Sat
            $table->string('repeat_end_type')->nullable(); // Never, On - Date, After (Occurances)
            $table->date('repeat_end_date')->nullable();
            $table->integer('repeat_end_occurancy')->nullable();
            $table->tinyInteger('change_coach')->default(0);
            $table->integer('coach_id')->nullable();
            $table->tinyInteger('change_venue')->default(0);
            $table->integer('venue_id')->nullable();
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
        Schema::dropIfExists('course_classes');
    }
};
