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
            $table->string('type')->default('course_withdrawal')->comment('course_withdrawal, leave, cancel');
            $table->integer('model_id')->nullable()->comment('leave request, or other base on type');
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
            $table->dropColumn('type');
            $table->dropColumn('model_id');
        });
    }
};
