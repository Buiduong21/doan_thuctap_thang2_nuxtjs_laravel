<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnOfProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function ($table) {
            $table->dropColumn('sale_price');
            $table->dropColumn('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function ($table) {
            $table->double('sale_price');
            $table->tinyint('status');
        });
    }
}