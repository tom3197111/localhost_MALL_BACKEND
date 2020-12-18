<?php

use Illuminate\Database\Seeder;

class CompanyInfoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('CompanyInfo')->delete();
        $data =[
                    'Company_name' => '漁具百貨',
                    'Company_phone' => '02-26761298',
                    'Company_address' => '新北市三俊街65巷18弄34號',
                    'Company_email' => 'hi4402600@yahoo.com.tw',
                    'created_at' => date("Y/m/d h-m-s") ,
                    'updated_at' => date("Y/m/d h-m-s") ,
                    'Company_introduction' => '本公司創建於民國兩千年',
                    'Company_All_rights_reserved' => 'All rights reserved|',
                    'Company_web'=>'http://www.fishing-tackle-mall.com/localhost_mall',
                    'Company_log'=>'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/log/log.jpg'
                ];
        DB::table('CompanyInfo')->insert($data);

    }
}
