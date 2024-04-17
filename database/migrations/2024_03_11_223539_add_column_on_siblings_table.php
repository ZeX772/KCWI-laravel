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
        Schema::table('siblings', function (Blueprint $table) {
            $table->integer('guardian_id')->nullable();
            $table->string('relationship')->nullable();
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
        Schema::table('siblings', function (Blueprint $table) {
        $table->dropColumn('guardian_id');
        $table->dropColumn('relationship');
        $table->dropTimestamps();
        });
    }
};
