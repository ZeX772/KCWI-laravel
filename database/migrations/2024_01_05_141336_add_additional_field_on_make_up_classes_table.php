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
            $table->date('date_requested')->nullable();
            $table->string('attachment')->nullable();
            $table->text('remarks')->nullable();
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
            $table->dropColumn('date_requested');
            $table->dropColumn('attachment');
            $table->dropColumn('remarks');
        });
    }
};
