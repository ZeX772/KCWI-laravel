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
        Schema::create('banks', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('bank_name', 255)->nullable();
            $table->string('bank_logo', 255)->nullable();
            $table->string('bank_status', 255)->nullable()->default('active');
            $table->timestamps();
            $table->enum('status', ['active', 'unarchive'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
};
