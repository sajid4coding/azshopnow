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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->mediumText('blog_title');
            $table->longText('description');
            $table->string('category')->nullable();
            $table->string('status')->default('published');
            $table->string('blog_photo')->nullable();
            $table->mediumText('Meta_Tag_Title')->nullable();
            $table->longText('Meta_Tag_Description')->nullable();
            $table->mediumText('Meta_Tag_Keywords')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
