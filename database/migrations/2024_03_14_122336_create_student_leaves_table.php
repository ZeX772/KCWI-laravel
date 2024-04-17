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
        Schema::create('student_leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable()->comment('Selected upcoming class');
            $table->string('reason')->nullable()->comment('Sick Leave, Casual Leave, Other...');
            $table->string('attachment')->nullable();
            $table->text('remarks')->nullable();
            $table->string('status')->default('active')->comment('[active, archived]');
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
        Schema::dropIfExists('student_leaves');
    }
};
