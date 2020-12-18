<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql3")->create('order_commodity_item', function (Blueprint $table) {
            $table->bigIncrements('Primary_key');
            $table->string('order_id')->comment('購物車編號');            
            $table->string('payment_number')->comment('訂單編號');            
            $table->string('commodity_id')->comment('商品編號');
            $table->integer('commodity_num')->comment('商品購買數量');
            $table->string('commodity_name')->comment('商品名');
            $table->string('price')->comment('商品單價');
            $table->string('total_fee')->comment('商品總金額');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql3")->dropIfExists('order_commodity_item');
    }
}
