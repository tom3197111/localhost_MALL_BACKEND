<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql")->create('config', function (Blueprint $table) {
            $table->bigIncrements('conf_id');
            $table->string('conf_title')->nullable()->comment('標體');
            $table->string('conf_name')->nullable()->comment('變量名');
            $table->string('conf_content')->nullable()->comment('變量值');
            $table->string('conf_order')->nullable()->comment('排序');
            $table->string('conf_tips')->nullable()->comment('描述');
            $table->string('field_type')->default(0)->nullable()->comment('字段類型 ');
            $table->string('field_value')->nullable()->comment('類型值 ');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql")->dropIfExists('config');
    }
}
