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
            $table->integer('parent_category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->string('parent_category_slug')->nullable();
            $table->integer('vendor_id');
            $table->string('shop_name')->nullable();
            $table->string('status')->default('unpublished');
            $table->string('sku')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('tag')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('vendorProductStatus')->default('published');
            $table->timestamps();
            $table->softdeletes();
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
