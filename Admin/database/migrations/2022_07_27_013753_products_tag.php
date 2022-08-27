<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_products', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tag')->unsigned();
            $table->foreign('id_tag')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tag_products');
    }
}
