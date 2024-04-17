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
        Schema::create('change_course_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('change_course_id')->constrained('change_courses')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->dateTime('datetime_to_send');
            $table->tinyInteger('send_immediate')->default(0);
            $table->string('category');
            $table->string('send_via');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('change_course_notifications');
    }
};
