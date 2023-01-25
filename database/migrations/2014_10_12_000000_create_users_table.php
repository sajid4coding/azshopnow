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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('role');
            $table->integer('vendor_id')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('status')->default('deactive');
            $table->string('dashboard_access')->default('active');
            $table->longText('address')->nullable();
            $table->longText('bio')->nullable();
            $table->string('banner')->nullable();
            $table->integer('seller_commission')->nullable();
            $table->integer('minimum_amount_withdraw')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
