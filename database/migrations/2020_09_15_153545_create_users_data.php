<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql2")->create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('會員姓名');
            $table->string('account')->unique()->comment('會員帳號');
            $table->string('password')->comment('會員密碼');
            $table->string('phone')->unique()->comment('會員電話');
            $table->string('Address')->comment('會員地址');
            $table->string('Email')->unique()->comment('會員信箱');
            $table->string('deal')->comment('條款');
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('email_verified_at')->comment('會員信箱驗證時間');
            $table->boolean('email_verified')->nullable()->comment('會員信箱是否驗證');
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
        Schema::connection("mysql2")->dropIfExists('users');
    }
}
