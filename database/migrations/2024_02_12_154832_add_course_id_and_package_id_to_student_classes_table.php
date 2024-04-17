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
        Schema::table('student_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('is_started')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_classes', function (Blueprint $table) {
            $table->dropColumn('course_id');
            $table->dropColumn('package_id');
            $table->dropColumn('is_started');
        });
    }
};
