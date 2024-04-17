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
        Schema::create('coach_leave_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coach_leave_id')->constrained('coach_leaves')->onDelete('cascade');
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
        Schema::dropIfExists('coach_leave_notifications');
    }
};
