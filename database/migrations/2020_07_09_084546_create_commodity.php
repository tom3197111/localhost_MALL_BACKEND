<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class Createcommodity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql")->create('Commodity', function (Blueprint $table) {
            $table->bigIncrements('art_id');
            $table->string('art_title')->nullable()->comment('商品名');
            $table->string('art_tag')->nullable()->comment('關鍵詞');
            $table->string('art_description')->nullable()->comment('描述');
            $table->string('art_thumb')->nullable()->comment('縮略圖');
            $table->string('art_content')->nullable()->comment('商品內容');
            $table->string('art_time')->default(0)->nullable()->comment('發布時間');
            $table->string('art_price')->nullable()->comment('價錢');
            $table->string('art_view')->default(0)->nullable()->comment('查看次數');
            $table->string('cate_id')->default(0)->nullable()->comment('分類ID');
            $table->string('file_upload')->nullable()->comment('圖片');
            $table->string('special')->nullable()->comment('是否特價 1是 0為否');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql")->dropIfExists('Commodity');
    }
}
 