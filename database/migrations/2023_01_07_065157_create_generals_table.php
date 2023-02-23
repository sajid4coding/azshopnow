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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->mediumText('website_title')->nullable();
            $table->integer('seller_commission');
            $table->integer('minimum_amount_withdraw');
            $table->string('payment_setting')->nullable();
            $table->mediumText('copyright_text')->nullable();
            $table->mediumText('capcha_status')->nullable();
            $table->mediumText('twak_io_status')->nullable();
            $table->mediumText('twak_io_id')->nullable();
            $table->mediumText('email')->nullable();
            $table->mediumText('phone_number')->nullable();
            $table->mediumText('teliphone')->nullable();
            $table->mediumText('address')->nullable();
            $table->mediumText('favicon')->nullable();
            $table->mediumText('logo')->nullable();
            $table->mediumText('invoice_logo')->nullable();
            // $table->mediumText('header_logo')->nullable();
            // $table->mediumText('footer_logo')->nullable();
            // $table->mediumText('invoice_logo')->nullable();
            // $table->mediumText('favicon_logo')->nullable();
            // $table->mediumText('dashboard_logo')->nullable();
            // $table->mediumText('dashboard_favicon_logo')->nullable();
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
        Schema::dropIfExists('generals');
    }
};
