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
            $table->tinyInteger('all_venue')->default(0);
            $table->tinyInteger('public_holiday')->default(0);
            $table->string('repeat')->nullable();
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
            $table->dropColumn("all_venue");
            $table->dropColumn("public_holiday");
            $table->dropColumn("repeat");
        });
    }
};
