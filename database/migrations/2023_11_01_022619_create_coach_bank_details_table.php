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
        Schema::create('coach_bank_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('bank_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('bank_account', 255)->nullable();
            $table->string('bank_account_name', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coach_bank_details');
    }
};
