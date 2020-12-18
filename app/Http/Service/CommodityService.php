<?php

namespace App\Http\Service;

use App\Http\Repository\CommodityRepository;
use Illuminate\Support\Facades\Validator;
use Image;
class CommodityService
{
    protected $CommodityRepository;

    public function __construct()
    {
        $this->CommodityRepository = new CommodityRepository();
    }

    public function index()
    {
         $data = $this->CommodityRepository->index();

         return $data;
    }

    public function store($input)
    {


            $rules=[
                'art_title'=>'required',
                'art_content'=>'required',
                'file_upload'=>'required'
            ];

            $message=[
                'art_title.required'=>'商品名稱不能為空',
                'art_content.required'=>'商品內容不能為空'

            ];

              $validator=Validator::make($input,$rules,$message);
              //當$validator接收到的待驗證的資料與驗證規則成立(passes)
              //則執行下去
              // dd($validator->passes());
              if($validator->passes()){
                //檔案副檔名
                $photo=$input['file_upload'];
                $re=$this->upload($photo);
                $input['file_upload']=$re;
                $re = $this->CommodityRepository->store($input);
                if($re){
                    return redirect('admin/Commodity');
                }else{
                    return back()->with('errors','數據新增失敗');
                }
              }else{
                return back()->with('errors','數據新增失敗');

              }
    }
                   //圖片上傳
    public function upload($photo)
    {

      if($photo->getClientOriginalExtension()!=null){
      //dd($photo);
      //檔案副檔名
      $file_extension=$photo->getClientOriginalExtension();
      //dd($file_extension);
      //產生自訂隨機檔案名稱 (就是隨機產生一個亂數來當檔案名字)
      //$file_name=uniqid();
      $file_name=uniqid().'.'.$file_extension;
      //dd($file_name);
      //檔案路徑
      // $file_relative_path ='images/merchandise/merchandise'.$file_name;
      // //將檔案路徑放入到public資料夾內
      // $file_path=public_path($file_relative_path);
      //裁切圖片並存檔
      //storage_path($file_path)
      Image::make($photo)->fit(450,300)->save(public_path().'/images/merchandise/merchandise'.$file_name);
      $re='public/images/merchandise/merchandise'.$file_name;
      //dd($re);
      return $re;
      }
    }
    public function edit($art_id)
    {
        $field = $this->CommodityRepository->edit($art_id);
        return $field;
    }
    public function update($art_id,$input)
    {
        if(!array_key_exists('file_upload',$input)){
            $input['file_upload']= $input['file_upload_path'];
            unset($input['file_upload_path']);
            $re=$this->CommodityRepository->update($art_id,$input);
        }else{
            $photo=$input['file_upload'];
            //dd($photo);
            $re=$this->upload($photo);
            $input['file_upload']=$re;
            unset($input['file_upload_path']);
            $rules=$this->CommodityRepository->rules($art_id);
            $re=$this->CommodityRepository->update($art_id,$input);
                if($re=1){
                    $file = $_SERVER['DOCUMENT_ROOT'] . 'localhost_MALL_BACKEND' . DIRECTORY_SEPARATOR . $rules[0]->file_upload;
                    // unlink('Mall\public\images\banner1.jpg');
                    unlink($file);
                }
        }if($re){
            return redirect('admin/Commodity');
        }else{
            return back()->with('errors','商品更新失敗');

        }
    }
    public function destroy($art_id){
        $rules = $this->CommodityRepository->destroy($art_id);
        $String = $rules[0]->file_upload;
        $url=str_replace("public\\",'', $String);
        unlink($url);

    }
}
