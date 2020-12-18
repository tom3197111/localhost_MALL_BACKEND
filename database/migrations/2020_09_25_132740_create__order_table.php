<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql3")->create('Order', function (Blueprint $table) {
            $table->string('order_id')->unique()->comment('購物車編號');
            $table->string('Vendor_transaction_number')->nullable()->unique()->comment('廠商交易編號');
            $table->string('payment_number')->nullable()->unique()->comment('訂單編號');
            $table->string('payment')->nullable()->comment('付款金額');
            $table->string('payment_type')->nullable()->comment('支付類型,1.線上支付/2.貨到付款');
            $table->string('post_fee')->nullable()->comment('運費');
            $table->string('status')->comment('目前狀態:1.未付款/2.已付款/3.未出貨/4.已出貨/5.交易成功/6.交易取消/7.缺貨');
            $table->timestamps();
            $table->dateTime('payment_time')->nullable()->comment('付款時間');
            $table->dateTime('consign_time')->nullable()->comment('出貨時間');
            $table->dateTime('end_time')->nullable()->comment('交易完成時間');
            $table->dateTime('close_time')->nullable()->comment('交易取消時間');
            $table->string('shipping_name')->nullable()->comment('物流名單');
            $table->string('shipping_code')->nullable()->comment('物流單號');
            $table->string('user_id')->nullable()->comment('買家ID');
            $table->string('buy_message')->nullable()->comment('買家留言');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::connection("mysql3")->dropIfExists('Order');
    }
}
