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
        Schema::create('levels', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 45)->nullable();
            $table->decimal('default_price', 10)->nullable();
            $table->timestamps();
            $table->string('status', 45)->nullable();
            $table->string('icon', 255)->nullable();
            $table->string('abbreviation', 45)->nullable();
            $table->integer('age')->nullable();
            $table->string('color', 45)->nullable();
            $table->string('remarks', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
};
