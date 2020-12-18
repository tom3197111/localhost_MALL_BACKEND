<?php

namespace App\Http\Service;

use App\Http\Repository\CompanyInfoRepository;
use Image;

class CompanyInfoService
{
    protected $CompanyInfoRepository;

    public function __construct()
    {
        $this->CompanyInfoRepository = new CompanyInfoRepository();
    }


    public function get()
    {
         $companyinfo = $this->CompanyInfoRepository->get();

         return $companyinfo;
    }
    public function editfind($companyinfo_id){
        $field=$this->CompanyInfoRepository->find($companyinfo_id);

        return $field;
    }
    public function update($id,$input){
        //尋找cate_id為傳參送來的cate_id
        //例如where('欄位名稱',欄位ID)
        //找到後將接收到的資料更新
        $re = $this->upload($input['Company_log']);
        $input['Company_log']=$re;
        $re=$this->CompanyInfoRepository->update($id,$input);

        if($re){
            return redirect('admin/Companyinfo');
        }else{
            return back()->with('errors','分類更新失敗');

        }

    }
    public function upload($photo)
    {

      if($photo->getClientOriginalExtension()!=null){
      //檔案副檔名
      $file_extension=$photo->getClientOriginalExtension();
      //裁切圖片並存檔
      Image::make($photo)->fit(450,300)->save(public_path().'/images/log/log.'.$file_extension);
      $re='public/images/log/log.'.$file_extension;
      //dd($re);
      return $re;
      }
    }

}
