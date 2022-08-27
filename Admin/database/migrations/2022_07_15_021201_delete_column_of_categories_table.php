<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnOfCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function ($table) {
            $table->dropColumn('slug_danhmuc');
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
        Schema::table('categories', function ($table) {
            $table->double('slug_danhmuc');
            $table->tinyint('status');
        });
    }
}