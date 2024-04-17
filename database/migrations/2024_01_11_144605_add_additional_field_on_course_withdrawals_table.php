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
        Schema::table('course_withdrawals', function (Blueprint $table) {
            $table->string('attachment')->nullable();
            $table->string('remarks')->nullable();
            $table->string('refund_payment')->nullable();
            $table->string('refund_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_withdrawals', function (Blueprint $table) {
            $table->dropColumn('attachment');
            $table->dropColumn('remarks');
            $table->dropColumn('refund_payment');
            $table->dropColumn('refund_amount');
        });
    }
};
