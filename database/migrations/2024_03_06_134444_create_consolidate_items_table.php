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
        Schema::create('consolidate_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consolidate_id')->nullable()->comment('invoice id, receipt id');
            $table->unsignedBigInteger('model_id')->nullable()->comment('Either invoice or Receipt');
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
        Schema::dropIfExists('consolidate_items');
    }
};
