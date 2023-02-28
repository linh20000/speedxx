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
            $table->string('name');
            $table->string('subname');
            $table->string('thumbnail_1');
            $table->string('thumbnail_2');
            $table->string('thumbnail_list');
            $table->string('category_id');
            $table->string('brand');
            $table->string('tags');
            $table->string('color');
            $table->string('size');
            $table->string('old_price');
            $table->string('off');
            $table->string('sale_price');
            $table->string('status');
            $table->string('description');
            $table->string('quantity');
            $table->string('seo_title');
            $table->string('seo_keyword');
            $table->string('seo_description');
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
