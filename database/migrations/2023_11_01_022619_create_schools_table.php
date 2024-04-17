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
        Schema::create('schools', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 255)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('invoice_prefix', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('contact_number', 255)->nullable();
            $table->string('school_website', 255)->nullable();
            $table->string('remarks', 255)->nullable();
            $table->time('check_in_time')->nullable()->comment('qr effective time for this school');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
};
