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
        Schema::create('class_checkins', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->string('checkin_status')->nullable()->comment('Success or Failed');
            $table->string('checkin_error_reason')->nullable();
            $table->timestamp('checkin_timestamp')->nullable();
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
        Schema::dropIfExists('class_checkins');
    }
};
