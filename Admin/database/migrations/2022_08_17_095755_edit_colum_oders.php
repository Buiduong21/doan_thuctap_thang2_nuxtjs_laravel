<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumOders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('total')->change();
        });
    }

    public function down()
    {
      Schema::dropIfExists('orders'); 
    }
}
