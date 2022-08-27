<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->dateTime('order_date');
            $table->string('order_number');
            $table->string('customer_address');
            $table->string('customer_email');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
