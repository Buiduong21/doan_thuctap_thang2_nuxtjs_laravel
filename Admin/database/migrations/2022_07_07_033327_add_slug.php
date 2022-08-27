<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlug extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug_danhmuc')->after('name');
        });
    }
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
             $table->dropColumn('slug_danhmuc');
        });
    }
}