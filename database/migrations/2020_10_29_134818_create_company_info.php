<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::connection("mysql")->create('CompanyInfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Company_name');
            $table->string('Company_phone');
            $table->string('Company_address');
            $table->string('Company_email');
            $table->string('Company_introduction');
            $table->string('Company_All_rights_reserved');
            $table->string('Company_web');
            $table->string('Company_log');
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
        Schema::connection("mysql")->dropIfExists('CompanyInfo');
    }
}
