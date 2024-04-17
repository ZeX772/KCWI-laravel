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
        Schema::table('platform_notifications', function (Blueprint $table) {
            $table->dropColumn('sent');
            $table->string('notification_types');
            $table->dateTime('email_send_date')->nullable();
            $table->dateTime('in_app_send_date')->nullable();
            $table->tinyInteger('email_sent')->default(0);
            $table->tinyInteger('in_app_sent')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('platform_notifications', function (Blueprint $table) {
            $table->dropColumn('notification_types');
            $table->dropColumn('email_send_date');
            $table->dropColumn('in_app_send_date');
            $table->dropColumn('email_sent');
            $table->dropColumn('in_app_sent');
        });
    }
};
