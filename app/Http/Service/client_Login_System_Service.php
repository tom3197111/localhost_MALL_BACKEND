<?php

namespace App\Http\Service;

use Image;

class client_Login_System_Service
{


    public function upload($photo)
    { 
      $filename = str_replace("http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/","",$photo['banner_url']);
      $photo=$photo['banner_upload'];
      if($photo->getClientOriginalExtension()!=null){
        //檔案副檔名
        // $file_extension=$photo->getClientOriginalExtension();
        //裁切圖片並存檔
        $re='/images/banner/'.$filename;
        Image::make($photo)->fit(185,395)->save(public_path().$re);
        

        return redirect('admin/client_Login_System');
        }else{

            return back()->with('errors','分類更新失敗');

        }  
      }
    

}
