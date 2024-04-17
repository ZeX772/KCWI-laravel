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
        Schema::table('coach_details', function (Blueprint $table) {
            $table->string('payment_method');
            $table->string('hkid');
            $table->string('phone');
            $table->date('dob')->nullable();
            $table->text('address');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coach_details', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            $table->dropColumn('hkid');
            $table->dropColumn('phone');
            $table->dropColumn('dob');
            $table->dropColumn('address');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('remarks');
        });
    }
};
