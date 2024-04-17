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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('rate', 10)->nullable()->comment('from coach_details monthly rate');
            $table->integer('number_of_classes')->nullable()->comment('count of classes to be attended within the specified month/date');
            $table->integer('days_of_attendance')->nullable()->comment('count of attendance within the specified month/date');
            $table->text('remarks')->nullable();
            $table->dateTime('pay_date')->nullable();
            $table->enum('status', ['draft', 'processing', 'paid'])->default('draft');
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
        Schema::dropIfExists('payrolls');
    }
};
