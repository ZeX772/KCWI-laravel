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
        Schema::create('platform_notification_receivers', function (Blueprint $table) {
            $table->id();
            $table->integer('platform_notification_id');
            $table->integer('user_id');
            $table->dateTime('email_send_datetime')->nullable();
            $table->dateTime('in_app_send_datetime')->nullable();
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
        Schema::dropIfExists('platform_notification_receivers');
    }
};
