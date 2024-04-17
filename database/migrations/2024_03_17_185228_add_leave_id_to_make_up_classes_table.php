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
        Schema::table('make_up_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('leave_id')->nullable()->after('student_class_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('make_up_classes', function (Blueprint $table) {
            $table->dropColumn('leave_id');
        });
    }
};
