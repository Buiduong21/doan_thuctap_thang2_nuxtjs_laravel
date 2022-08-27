<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumOrderDetails extends Migration
{
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->bigInteger('total')->change();
            $table->bigInteger('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details'); 
    }
}
