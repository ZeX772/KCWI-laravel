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
        Schema::table('coach_availabilities', function (Blueprint $table) {
            $table->string('availability_start')->nullable();
            $table->string('availability_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coach_availabilities', function (Blueprint $table) {
            $table->dropColumn('availability_start');
            $table->dropColumn('availability_end');
        });
    }
};
