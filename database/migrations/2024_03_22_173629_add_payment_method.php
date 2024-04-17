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
        Schema::create('user_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->integer('expiry_month');
            $table->integer('expiry_year');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('Coach');
            $table->string('name');
            $table->string('scheme');
            $table->string('last4');
            $table->string('type');
            $table->datetime('token_expiry');
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
        Schema::dropIfExists('user_payment_methods');

    }
};
