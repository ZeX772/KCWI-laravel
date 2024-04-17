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
        Schema::create('school_venue_facilities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_venue_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->timestamps();
            $table->string('status', 45)->nullable()->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_venue_facilities');
    }
};
