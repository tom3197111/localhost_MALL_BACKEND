<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql")->create('Category', function (Blueprint $table) {
            $table->bigIncrements('cate_id');
            $table->string('cate_name')->nullable()->comment('分類名稱');
            $table->string('cate_title')->nullable()->comment('分類說明');
            $table->string('cate_keywords')->nullable()->comment('關鍵字');
            $table->string('cate_description')->nullable()->comment('描述');
            $table->string('cate_view')->default(0)->nullable()->comment('查看次數');
            $table->string('cate_order')->default(0)->nullable()->comment('排序');
            $table->string('cate_pid')->nullable()->comment('父級id');
            $table->string('file_upload')->nullable()->comment('圖片');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql")->dropIfExists('Category');

    }
}
