<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumUsesTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('gender')->nullable();
            $table->string('avatar_url')->nullable();
            $table->text('education')->nullable();
            $table->string('location')->nullable();
            $table->text('skills')->nullable();
            $table->text('notes')->nullable();
            $table->date('birthday')->nullable();
            $table->string('roles')->nullable();
            $table->integer('is_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('avatar_url');
            $table->dropColumn('education');
            $table->dropColumn('location');
            $table->dropColumn('skills');
            $table->dropColumn('notes');
            $table->dropColumn('birthday');
            $table->dropColumn('roles');
            $table->dropColumn('is_active');
        });
    }
}