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
        Schema::table('change_courses', function (Blueprint $table) {
            $table->string('attachment')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('student_class_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('change_courses', function (Blueprint $table) {
            $table->dropColumn('attachment');
            $table->dropColumn('remarks');
            $table->dropColumn('student_class_id');
        });
    }
};
