<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingInterface extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql")->create('ShippingInterface', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('LogisticsType')->comment('商家');
            $table->string('Types_of')->comment('到店:1宅配:0');
            $table->string('post_fee')->comment('運費');
            $table->string('logo_img')->comment('logo');
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
        Schema::connection("mysql")->dropIfExists('ShippingInterface');
    }
}
