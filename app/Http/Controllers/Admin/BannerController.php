<?php

namespace App\Http\Controllers\Admin;

use App\Http\Service\BannerService;
use Illuminate\Http\Request;

class BannerController extends CommonController
{
    protected $BannerService;


    public function __construct()
    {
        $this->BannerService = new BannerService();
    }
    //get.admin/Banner 全部Banner
    public function index()
    {
        $data = $this->BannerService->index();
        return view('admin.banner.index',compact('data'));
    }


    // //get.admin/Banner/create 將主分類的取出
    // public function create(){

    //     $data=$this->CategoryService->tree();
    //     return view('admin.Commodity.add',compact('data'));
    // }

    // //post.admin/Banner //修改輪播圖
    // public function store()
    // {
    //     $input=Request()->except('_token');
    //     $validator = $this->BannerService->store($input);
    //     return $validator;

    // }

    //get.admin/Banner/{Banner}/edit
    //進入編輯分類的頁面
    public function edit($id){

        $field =$this->BannerService->edit($id);

        return view('admin.banner.edit',compact('field'));
    }


     //put.admin/Banner/{Banner} 更新商品
    //接收的傳參為url前端form內的網址admin/Banner/{Banner}
    public function update($id){
        $input=Request()->except('_token','_method');
        // dd($input);
         $update = $this->BannerService->store($id,$input);
        return $update;
    }


        // //delete.admin/Banner/{Banner} 刪除單個商品
        // public function destroy($art_id){
        //     dd("a");
        //     $this->CommodityService->destroy($art_id);

        //      if($re){
        //         $date=[
        //             'status'=>0,
        //             'msg'=>'商品刪除成功',
        //         ];
        //     }else{
        //         $date=[
        //             'status'=>1,
        //             'msg'=>'商品刪除失敗',
        //         ];
        //     }

        //     return $date;
        // }



}
