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
        Schema::create('product__returns', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('vendor_id');
            $table->string('invoice_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->longText('return_message');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('product__returns');
    }
};
