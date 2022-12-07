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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('vendor_id');
            $table->string('billing_first_name');
            $table->string('billing_email');
            $table->string('billing_company')->nullable();
            $table->string('billing_phone');
            $table->string('billing_country_code')->nullable();
            $table->string('billing_country_id')->nullable();
            $table->longText('billing_address');
            $table->longText('order_comments')->nullable();
            $table->integer('subtotal');
            $table->integer('coupon_discount')->nullable();
            $table->integer('after_coupon_discount')->nullable();
            $table->integer('delivery_change');
            $table->integer('total_price');
            $table->string('payment_method');
            $table->string('payment')->default('unpaid');
            $table->string('payment_status')->default('processing');
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
        Schema::dropIfExists('invoices');
    }
};
