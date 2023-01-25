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
            $table->integer('vendor_id');
            $table->mediumText('product_title');
            $table->integer('product_price');
            $table->string('discount_price')->nullable();
            $table->integer('parent_category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->string('parent_category_slug')->nullable();
            $table->string('sku')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('shop_name')->nullable();
            $table->longText('tag')->nullable();
            $table->integer('product_views')->nullable()->default(0);
            $table->string('campaign')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('status')->default('unpublished');
            $table->string('vendorProductStatus')->default('published');
            $table->string('meta_tag')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
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
