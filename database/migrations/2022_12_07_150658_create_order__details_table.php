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
        Schema::create('order__details', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('user_id');
            $table->integer('vendor_id');
            $table->integer('product_id');
            $table->integer('size_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('quantity');
            $table->integer('total_price');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order__details');
    }
};
