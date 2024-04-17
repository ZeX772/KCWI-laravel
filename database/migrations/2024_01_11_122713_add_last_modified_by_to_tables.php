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
            $table->integer('last_modified_by');
        });

        Schema::table('platform_notifications', function (Blueprint $table) {
            $table->dateTime('datetime_to_send')->nullable()->change();
            $table->integer('sent')->default(0);
            $table->integer('last_modified_by');
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
            $table->dropColumn('last_modified_by');
        });

        Schema::table('platform_notifications', function (Blueprint $table) {
            $table->dropColumn('sent');
            $table->dropColumn('last_modified_by');
        });
    }
};
