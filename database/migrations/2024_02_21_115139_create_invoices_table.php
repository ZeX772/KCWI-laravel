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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('invoice_number');
            $table->date('date');
            $table->string('type')->comment('shopping, course enrollment, competition enrollment');
            $table->decimal('total_amount');
            $table->string('status')->comment('processing, completed, waiting, unsuccessful, refunding, refunded');
            $table->timestamps();
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('item_id')->comment('course_enrollment_id or competition_enrollment_id');
            $table->decimal('price');
            $table->decimal('quantity');
            $table->decimal('discount');
            $table->decimal('total');
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
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoice_items');
    }
};
