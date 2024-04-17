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
        Schema::table('news_articles', function (Blueprint $table) {
            $table->enum('category', ['normal_news', 'urgent_news'])->nullable();
            $table->tinyInteger('is_active')->default(1)->comment('Use for urgent news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_articles', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('is_active');
        });
    }
};
