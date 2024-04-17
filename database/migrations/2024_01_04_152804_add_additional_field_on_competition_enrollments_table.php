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
        Schema::table('competition_enrollments', function (Blueprint $table) {
            $table->text('remarks')->nullable();
            $table->string('invoice')->nullable();
            $table->string('entries_form')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competition_enrollments', function (Blueprint $table) {
            $table->dropColumn('remarks');
            $table->dropColumn('invoice');
            $table->dropColumn('entries_form');
        });
    }
};
