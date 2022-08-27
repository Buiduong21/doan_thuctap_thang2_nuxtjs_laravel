<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->after('name');
            $table->string('code');
        });
    }
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('code');
        });
    }
}