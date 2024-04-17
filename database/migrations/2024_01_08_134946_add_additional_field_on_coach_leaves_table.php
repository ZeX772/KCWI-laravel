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
        Schema::table('coach_leaves', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
            $table->string('attachment')->nullable();
            $table->decimal('deduction_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coach_leaves', function (Blueprint $table) {
            $table->dropColumn('attachment');
            $table->dropColumn('deduction_amount');
        });
    }
};
