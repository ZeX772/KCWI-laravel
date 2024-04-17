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
        Schema::table('notification_categories', function (Blueprint $table) {
            $table->renameColumn('category', 'template_name');
        });

        Schema::table('platform_notifications', function (Blueprint $table) {
            $table->renameColumn('category', 'template_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notification_categories', function (Blueprint $table) {
            $table->renameColumn('template_name', 'category');
        });

        Schema::table('platform_notifications', function (Blueprint $table) {
            $table->renameColumn('template_id', 'category');
        });
    }
};
