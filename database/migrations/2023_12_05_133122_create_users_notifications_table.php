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
        Schema::create('users_notifications_table', function (Blueprint $table) {
            
            //id
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users_table')->onDelete('cascade');

            //notification_id
            $table->unsignedBigInteger('notification_id');
            $table->foreign('notification_id')->references('notification_id')->on('notifications_table')->onDelete('cascade');

            //timestamp
            $table->timestamps();

            //Composite Primary Key
            $table->primary(['id','notification_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_notifications_table');
    }
};
