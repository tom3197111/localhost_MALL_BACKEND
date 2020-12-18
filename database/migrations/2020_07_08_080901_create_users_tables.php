<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql")->create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('使用者帳號');
            $table->string('email')->unique()->comment('使用者email');
            $table->string('password')->comment('使用者密碼');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql")->dropIfExists('users');
    }
}
