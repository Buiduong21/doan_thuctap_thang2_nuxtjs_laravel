<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->string('content');
            $table->string('slug');
            $table->timestamps();
            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}