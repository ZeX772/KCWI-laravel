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
        Schema::table('competition_group_participants', function (Blueprint $table) {
            $table->renameColumn('competition_id', 'competition_category_id');
        });

        Schema::table('competition_enrollments', function (Blueprint $table) {
            $table->renameColumn('competition_id', 'competition_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competition_group_participants', function (Blueprint $table) {
            $table->renameColumn('competition_category_id', 'competition_id');
        });

        Schema::table('competition_enrollments', function (Blueprint $table) {
            $table->renameColumn('competition_category_id', 'competition_id');
        });
    }
};
