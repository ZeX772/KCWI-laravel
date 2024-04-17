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
        Schema::table('school_closures', function (Blueprint $table) {
            $table->tinyInteger('all_facility')->default(0)->after('all_venue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_closures', function (Blueprint $table) {
            $table->dropColumn("all_facility");
        });
    }
};
