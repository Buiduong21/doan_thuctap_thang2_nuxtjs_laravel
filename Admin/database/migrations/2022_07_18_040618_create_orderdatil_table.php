<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdatilTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->double('price');
            $table->integer('quantity');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
