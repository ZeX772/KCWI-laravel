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
        Schema::create('place_videos', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->nullable();
            $table->string('title')->nullable();
            $table->string('youtube_link')->nullable();
            $table->foreignId('level_id');
            $table->foreignId('characteristics_id');
            $table->text('description')->nullable();
            $table->enum('status', ['published', 'unpublished', 'archived']);
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
        Schema::dropIfExists('place_videos');
    }
};
