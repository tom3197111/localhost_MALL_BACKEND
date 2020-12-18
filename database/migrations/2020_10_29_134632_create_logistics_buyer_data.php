<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticsBuyerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql3")->create('logistics_buyer_data', function (Blueprint $table) {
            $table->string('order_id')->unique()->comment('購物車編號');
            $table->string('Vendor_transaction_number')->nullable()->unique()->comment('廠商交易編號');
            $table->string('payment_number')->nullable()->unique()->comment('訂單編號');
            $table->string('Store')->nullable()->comment('店家');
            $table->string('CVSStoreID')->nullable()->comment('門市編號:');
            $table->string('CVSStoreName')->nullable()->comment('門市');
            $table->string('CVSAddress')->nullable()->comment('門市地址');
            $table->string('CVSTelephone')->nullable()->comment('門市電話');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql3")->dropIfExists('logistics_buyer_data');
    }
}
