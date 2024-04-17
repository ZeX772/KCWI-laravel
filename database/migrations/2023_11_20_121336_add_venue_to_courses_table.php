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
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('venue')->nullable();
            $table->integer('facility')->nullable();
            $table->integer('course_type')->nullable();
            $table->json('course_coaches')->nullable();
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
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('venue');
            $table->dropColumn('facility');
            $table->dropColumn('course_type');
            $table->dropColumn('course_coaches');
            $table->dropTimestamps();
        });
    }
};
