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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('paypal')->nullable();
            $table->string('stripe')->nullable();
            $table->string('skrill')->nullable();
            $table->string('bank_account_holder')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('bank_routing_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('bank_IBAN')->nullable();
            $table->string('bank_swift_code')->nullable();
            $table->string('checkbox')->nullable();
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
        Schema::dropIfExists('wallets');
    }
};
