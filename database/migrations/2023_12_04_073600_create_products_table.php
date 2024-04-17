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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('product_category_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('discount_percentage')->nullable();
            $table->decimal('tax_included_price')->nullable();
            $table->decimal('tax_excluded_price')->nullable();
            $table->integer('on_shelf')->nullable()->default(1)->comment('1 = on-shelf, 0/null = off-shelf');
            $table->string('status', 45)->nullable()->default('active');
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
        Schema::dropIfExists('products');
    }
};
