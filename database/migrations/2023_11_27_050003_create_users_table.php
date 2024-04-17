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

        // Check if the table exists
        if (Schema::hasTable('users_table')) {
            // Drop the table if it exists
            Schema::dropIfExists('users_table');
        }

        Schema::create('users_table', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('school_id')->nullable();
            
            //username
            $table->string('username')->default('unknown');
            //first_name
            $table->string('first_name')->default('Unknown');
            //last_name
            $table->string('last_name')->default('Unknown');
            //chinese_ name
            $table->string('chinese_name')->default('Unknown');
            
            //newly added
            //hkid
            $table->string('hkid')->default('Unknown');
            //address
            $table->text('address')->default('Unknown');
            //nationality
            $table->string('nationality')->default('Unknown');
            //phone
            $table->string('phone')->default('Unknown');
            //email
            $table->string('email')->default('Unknown');
            //dob
            $table->date('dob')->nullable();
            //remarks
            $table->text('remarks')->default('Unknown');

            //archived
            $table->boolean('archived')->default(false);

            //created_at, updated_at
            $table->timestamps();

            $table->foreign('role_id')->references('role_id')->on('roles_table')->onDelete('cascade');  //foreign key constraint
            $table->foreign('school_id')->references('school_id')->on('schools_table')->onDelete('cascade');    //foreign key constraint

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_table');
    }
};
