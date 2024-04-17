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
        Schema::create('guardian_information', function (Blueprint $table) {
            $table->id();
            $table->integer('guardian_id')->nullable();
            $table->string('profile_img')->nullable()->default('users/default.png');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('chinese_name')->nullable();
            $table->string('hkid')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('hear_about_us')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('guardian_information');
    }
};