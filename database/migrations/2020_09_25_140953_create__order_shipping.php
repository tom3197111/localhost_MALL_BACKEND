<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql3")->create('order_shipping', function (Blueprint $table) {
            $table->bigIncrements('Primary_key');
            $table->string('order_id')->comment('購物車編號');
            $table->string('payment_number')->nullable()->comment('訂單編號');
            $table->string('AllPayLogisticsID')->nullable()->comment('綠界科技的物流交易編號');
            $table->string('account')->comment('帳號');
            $table->string('receiver_name')->comment('收貨人姓名');
            $table->string('receiver_mobile')->comment('收貨人行動電話');
            $table->string('receiver_email')->comment('收件人email');
            $table->string('receiver_address')->nullable()->comment('收貨地址');
            $table->string('LogisticsType')->nullable()->comment('物流類型');
            $table->string('LogisticsSubType')->comment('物流子類型');
            $table->string('BookingNote')->nullable()->comment('托運單號(宅配');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql3")->dropIfExists('order_shipping');
    }
}
