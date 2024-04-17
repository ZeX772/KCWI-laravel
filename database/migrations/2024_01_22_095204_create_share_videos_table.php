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
        Schema::create('share_videos', function (Blueprint $table) {
            $table->id();
            $table->integer('video_id');
            $table->string('notification_type');
            $table->json('notification_type_data')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('date_to_send');
            $table->tinyInteger('publish_immediately');
            $table->string('status');
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
        Schema::dropIfExists('share_videos');
    }
};
