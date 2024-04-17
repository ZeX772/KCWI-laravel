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
        // Drop the existing foreign key constraint
        Schema::table('plans', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        // Add a new foreign key constraint with cascade on delete
        Schema::table('plans', function (Blueprint $table) {
            // Assuming the foreign key is 'role_id' and references 'id' in the 'roles' table
            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade'); // This line sets up cascade on delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the foreign key constraint
        Schema::table('plans', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        // Recreate the foreign key constraint without cascade on delete
        Schema::table('plans', function (Blueprint $table) {
            // Assuming the foreign key is 'role_id' and references 'id' in the 'roles' table
            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles');
        });
    }
};
