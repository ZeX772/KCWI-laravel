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
        Schema::create('school_venues', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('address', 255)->nullable();
            $table->string('coordinates', 255)->nullable();
            $table->integer('school_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('contact_person', 255)->nullable();
            $table->string('phone_number', 255)->nullable();
            $table->string('remarks', 255)->nullable();
            $table->string('status', 255)->nullable()->default('active');
            $table->string('short_name', 255)->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_venues');
    }
};
