<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//公用Controller
//需要use下列兩個
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Image;

class CommonController extends Controller
{
/*     //圖片上傳
    public function upload()
    {
        //從前端送來的資料內取出檔案並命名
      $file= Request()->file('Filedata');
      //判斷是否有文件
      if($file->isValid()){
        //獲取文件名
        //$clientName=$file->getClientOriginalName();
          //取出緩存的文件的絕對路徑
          $realPath=$file->getRealPath();
          //取得上傳檔案的副檔名
          $entension=$file->getClientOriginalExtension();
          //mt_rand 100~999之間的一個隨機數
          $newName=date('YmdHis').mt_rand(100,999).'.'.$entension;
          //移動上傳檔案 並重新命名
          // 從根目錄(base_path) 存到文件夾(uploads)內
          //blog\uploads
          $path=$file->move(base_path(),'/uploads',$newName);
          $filepath='/uploads'.$newName;
          return $filepath;
      }
    } */


      }
