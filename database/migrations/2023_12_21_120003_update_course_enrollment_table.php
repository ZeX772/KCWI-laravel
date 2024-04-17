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
        Schema::table('course_enrollments', function (Blueprint $table) {
            $table->string('invoice')->nullable();
            $table->text('remarks')->nullable();
            $table->string('entries_form')->default('Website');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_enrollments', function (Blueprint $table) {
            $table->dropColumn('invoice');
            $table->dropColumn('remarks');
            $table->dropColumn('entries_form');
        });
    }
};
