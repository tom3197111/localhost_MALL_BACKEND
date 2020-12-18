<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql2")->create('users_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account')->comment('會員帳號');
            $table->string('name')->comment('收貨人姓名');
            $table->string('Email')->comment('收貨人信箱');
            $table->string('phone')->comment('收貨人電話');
            $table->string('Address')->nullable()->comment('收貨人地址');
            $table->string('tag')->nullable()->comment('標籤');
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
        Schema::connection("mysql2")->dropIfExists('users_address');
    }
}
