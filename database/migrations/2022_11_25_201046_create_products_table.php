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
            $table->mediumText('product_title');
            $table->string('product_price');
            $table->string('discount_price')->nullable();
            $table->integer('parent_category_id');
            $table->integer('vendor_id');
            $table->string('shop_name')->nullable();
            $table->string('status')->default('unpublished');
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('gellery')->nullable();
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
