<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('banner')->delete();
        $data =[
                    [
                    'banner_class' => 'item active',
                    'banner_tag' => 1,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/banner1.jpg',
                    'banner_content_one' => '商品第一段文字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字  ' ,
                    'banner_content_four' =>'圖片按鈕文字 ',
                    ],
                    [
                    'banner_class' => 'item item2',
                    'banner_tag' => 2,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/banner2.jpg',
                    'banner_content_one' => '商品第一段文字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字  ' ,
                    'banner_content_four' =>'圖片按鈕文字 ',
                    ],
                    [
                    'banner_class' => 'item item3',
                    'banner_tag' => 3,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/banner3.jpg',
                    'banner_content_one' => '商品第一段文字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字  ' ,
                    'banner_content_four' =>'圖片按鈕文字 ',
                    ],
                    [
                    'banner_class' => 'item item4',
                    'banner_tag' => 4,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/banner4.jpg',
                    'banner_content_one' => '商品第一段文字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字  ' ,
                    'banner_content_four' =>'圖片按鈕文字 ',
                    ],
                    [
                    'banner_class' => 'item item2',
                    'banner_tag' => 5,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/bottom1.jpg',
                    'banner_content_one' => '商品第一段文字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字  ' ,
                    'banner_content_four' =>'圖片按鈕文字 ',
                    ],
                    [
                    'banner_class' => 'item item2',
                    'banner_tag' => 6,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/bottom2.jpg',
                    'banner_content_one' => '商品第一段文字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字  ' ,
                    'banner_content_four' =>'圖片按鈕文字 ',
                    ],
                    [
                    'banner_class' => 'item item2',
                    'banner_tag' => 7,
                    'banner_url' => null,
                    'banner_content_one' => '上標體大字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => null ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => 'bb-left-agileits-w3layouts-inner grid',
                    'banner_tag' => 8,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/bb1.jpg',
                    'banner_content_one' => '上標體大字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字' ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => 'bb-middle-agileits-w3layouts grid',
                    'banner_tag' => 9,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/bottom3.jpg',
                    'banner_content_one' => '上標體大字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字' ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => 'bb-middle-agileits-w3layouts forth grid',
                    'banner_tag' => 10,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/bottom4.jpg',
                    'banner_content_one' => '上標體大字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字' ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => 11,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/bot_1.jpg',
                    'banner_content_one' => '下廣告大字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字' ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => 12,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/bot_2.jpg',
                    'banner_content_one' => '下廣告大字' ,
                    'banner_content_two' => '商品第二段文字' ,
                    'banner_content_three' => '商品第三段小字' ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => 13,
                    'banner_url' => null,
                    'banner_content_one' => '第五個下廣告大字' ,
                    'banner_content_two' => null ,
                    'banner_content_three' => null ,
                    'banner_content_four' => '第五個圖片按鈕文字',
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => 14,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/mid.jpg',
                    'banner_content_one' => '活動名稱' ,
                    'banner_content_two' => '活動中間字' ,
                    'banner_content_three' => '活動內容' , 
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => 15,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/log_pic1.jpg',
                    'banner_content_one' => '活動名稱' ,
                    'banner_content_two' => '活動中間字' ,
                    'banner_content_three' => '活動內容' , 
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => 16,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/log_pic2.jpg',
                    'banner_content_one' => '活動名稱' ,
                    'banner_content_two' => '活動中間字' ,
                    'banner_content_three' => '活動內容' , 
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => 17,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/log_pic3.jpg',
                    'banner_content_one' => '活動名稱' ,
                    'banner_content_two' => '活動中間字' ,
                    'banner_content_three' => '活動內容' , 
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => 18,
                    'banner_url' => 'http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/log_pic4.jpg',
                    'banner_content_one' => '活動名稱' ,
                    'banner_content_two' => '活動中間字' ,
                    'banner_content_three' => '活動內容' , 
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => null,
                    'banner_url' => null,
                    'banner_content_one' => '物流' ,
                    'banner_content_two' => '物流內容' ,
                    'banner_content_three' => null ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => null,
                    'banner_url' => null,
                    'banner_content_one' => '活動' ,
                    'banner_content_two' => '活動內容' ,
                    'banner_content_three' => null ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => null,
                    'banner_url' => null,
                    'banner_content_one' => '促銷' ,
                    'banner_content_two' => '促銷內容' ,
                    'banner_content_three' => null ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => null,
                    'banner_url' => null,
                    'banner_content_one' => '禮物' ,
                    'banner_content_two' => '禮物內容' ,
                    'banner_content_three' => null ,
                    'banner_content_four' => null,
                    ],
                    [
                    'banner_class' => null,
                    'banner_tag' => null,
                    'banner_url' => null,
                    'banner_content_one' => '我們有什麼' ,
                    'banner_content_two' => '我們的信息' ,
                    'banner_content_three' => '優惠通知' ,
                    'banner_content_four' => null,
                    ],

                ];
        DB::table('banner')->insert($data);
       //
    }
}
