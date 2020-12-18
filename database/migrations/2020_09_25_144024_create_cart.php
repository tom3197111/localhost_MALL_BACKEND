<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql4")->create('shopping_cart', function (Blueprint $table) {
            $table->bigIncrements('Primary_key');
            $table->string('order_id')->comment('購物車編號');
            $table->string('user_account')->comment('買家帳號');            
            $table->string('id')->comment('商品編號');
            $table->integer('quantity')->comment('商品購買數量');
            $table->string('name')->comment('商品名');
            $table->string('price')->comment('商品單價');
            $table->string('total_fee')->comment('商品總金額');
            $table->string('image')->comment('商品圖片');
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
        Schema::connection("mysql4")->dropIfExists('shopping_cart');
    }
}
