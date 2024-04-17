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
        Schema::dropIfExists('school_closures');

        Schema::create('school_closures', function (Blueprint $table) {
            $table->id();
            $table->string('reason')->nullable();
            $table->integer('closure_type')->nullable();
            $table->integer('venue')->nullable();
            $table->integer('facility')->nullable();
            $table->date('date')->nullable();
            $table->string('year')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->tinyInteger('is_whole_day')->default(0);
            $table->string('remarks', 255)->nullable();
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
        Schema::dropIfExists('school_closures');
    }
};
