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
        Schema::create('competition_group_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('assign_line');
            $table->string('group_number');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('competition_group_participants');
    }
};
