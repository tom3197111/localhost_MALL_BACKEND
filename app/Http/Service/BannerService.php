<?php

namespace App\Http\Service;

use App\Http\Repository\BannerRepository;
use Image;
use Illuminate\Support\Facades\Validator;
class BannerService
{
    protected $BannerRepository;

    public function __construct()
    {
        $this->BannerRepository = new BannerRepository();
    }

    public function index ()
    {
        $Banner = $this->BannerRepository->index();
        return $Banner;

    }

    public function edit($id)
    {
      $field =$this->BannerRepository->edit($id);
      return $field;
    }

    public function store($id,$input)
    {
        if(isset($input['banner_upload'])){
                $photo=$input['banner_upload'];
                $photo_path=$input['banner_url'];
                $photo=$this->upload($photo,$photo_path);
                if($photo==false){
                  return back()->with('errors','數據新增失敗 需要JPG檔');
                }
                unset($input['banner_upload']);
                $re = $this->BannerRepository->store($id,$input);
                if($re){
                    return redirect('admin/banner');
                }elseif ($photo==true && $re==0) {
                    return redirect('admin/banner');
                }else{
                    return back()->with('errors','數據新增失敗');
                }
        }else{
              unset($input['banner_upload']);
              $re = $this->BannerRepository->store($id,$input);
                if($re){
                    return redirect('admin/banner');
                }else{
                    return back()->with('errors','數據新增失敗');
                }
        }

    }
                   //圖片上傳
    public function upload($photo=null,$photo_path)
    { 
      if($photo->getClientOriginalExtension() == 'jpg'){
      //檔案副檔名
      // $file_extension=$photo->getClientOriginalExtension();
      // $photo_path = substr($photo_path, 15);
      //檔案路徑
      $file_name=str_replace('http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/public/images/banner/','', $photo_path);
      Image::make($photo)->fit(1680,700)->save(public_path().'/images/banner/'.$file_name);
      return true;
      }else{
        return false;
      }
        return back()->with('errors','數據新增失敗 發生未知錯誤');
    }
}
