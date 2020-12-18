<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql")->create('banner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banner_class')->nullable()->comment('HTMl的class');
            $table->string('banner_tag')->default(0)->nullable()->comment('輪播牆播放順序');
            $table->string('banner_url')->nullable()->comment('圖片路徑');
            $table->string('banner_content_one')->nullable()->comment('商品第一段文字');
            $table->string('banner_content_two')->nullable()->comment('商品第二段文字');
            $table->string('banner_content_three')->nullable()->comment('商品第三段小字');
            $table->string('banner_content_four')->nullable()->comment('圖片按鈕文字');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql")->dropIfExists('banner');
    }
}
