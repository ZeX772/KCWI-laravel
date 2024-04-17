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
        Schema::create('cancelled_classes', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->string('reason')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('cancelled_by');
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
        Schema::dropIfExists('cancelled_classes');
    }
};
