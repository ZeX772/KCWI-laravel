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
    Schema::table('share_videos', function (Blueprint $table) {
        // Add a new column 'platform_notifications_id' after 'video_id'
        $table->unsignedBigInteger('platform_notifications_id')->nullable();
    });
}

public function down()
{
    Schema::table('share_videos', function (Blueprint $table) {
        // Drop the 'platform_notifications_id' column if rolling back the migration
        $table->dropColumn('platform_notifications_id');
    });
}
};
