<?php

use Illuminate\Database\Seeder;

class configSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->delete();
        $data =[
                    [
                    'conf_title' => '網站標題',
                    'conf_name' => 'web_title',
                    'conf_content' => '我的作品',
                    'conf_order' => '1',
                    'conf_tips' => '網站訪問情況統計' ,
                    'field_type' => 'input' ,
                    'field_value' =>'',
                    ],
                    [
                    'conf_title' => '網站標題',
                    'conf_name' => 'web_count',
                    'conf_content' => '',
                    'conf_order' => '3',
                    'conf_tips' => '網站訪問情況統計' ,
                    'field_type' => 'textarea' ,
                    'field_value' =>'',
                    ],
                    [
                    'conf_title' => '關鍵詞',
                    'conf_name' => 'keywords',
                    'conf_content' => '我是關鍵詞 他是關鍵詞',
                    'conf_order' => '5',
                    'conf_tips' => '' ,
                    'field_type' => 'input' ,
                    'field_value' =>'',
                    ],
                    [
                    'conf_title' => '網站標題',
                    'conf_name' => 'web_staus',
                    'conf_content' => '0',
                    'conf_order' => '5',
                    'conf_tips' => 'as' ,
                    'field_type' => 'radio' ,
                    'field_value' =>'1|開啟 , 0|關閉',
                    ],
                    [
                    'conf_title' => '輔助標題',
                    'conf_name' => '輔助標題',
                    'conf_content' => '',
                    'conf_order' => '4',
                    'conf_tips' => '對網站名稱的補充' ,
                    'field_type' => 'input' ,
                    'field_value' =>'',
                    ],
                    [
                    'conf_title' => '描述',
                    'conf_name' => 'description',
                    'conf_content' => '',
                    'conf_order' => '6',
                    'conf_tips' => '' ,
                    'field_type' => 'input' ,
                    'field_value' =>'',
                    ],
                    [
                    'conf_title' => '版權信息',
                    'conf_name' => 'copyright',
                    'conf_content' => 'by 駱俊偉學習laravel作品 <a href="http://mall_backend.com/falcon/" target="_blank"> href="http://mall_backend.com/falcon/</a>',
                    'conf_order' => '7',
                    'conf_tips' => '' ,
                    'field_type' => 'textarea' ,
                    'field_value' =>'',
                    ],
                ];

        DB::table('config')->insert($data);
    }
}
