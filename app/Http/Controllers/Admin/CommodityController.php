<?php

namespace App\Http\Controllers\Admin;

use App\Http\Service\CategoryService;
use App\Http\Service\CommodityService;
use Illuminate\Http\Request;

class CommodityController extends CommonController
{
    protected $CommodityService;
    protected $CategoryService;


    public function __construct()
    {
        $this->CommodityService = new CommodityService();
        $this->CategoryService = new CategoryService();
    }
    //get.admin/Commodity 全部商品列表
    public function index()
    {
        $data = $this->CommodityService->index();
        return view('admin.Commodity.index',compact('data'));
    }


    //get.admin/Commodity/create 將主分類的取出
    public function create(){

        $data=$this->CategoryService->tree();
        return view('admin.Commodity.add',compact('data'));
    }

    //post.admin/Commodity //新增商品
    public function store()
    {
        $input=Request()->except('_token');
        $input['art_time']=time();
        $validator = $this->CommodityService->store($input);

        return $validator;

    }

    //get.admin/Commodity/{Commodity}/edit 編輯商品
    //進入編輯分類的頁面
    public function edit($art_id){

        $data=$this->CategoryService->tree();
        $field =$this->CommodityService->edit($art_id);

        return view('admin.Commodity.edit',compact('data','field'));
    }

     //put.admin/Commodity/{Commodity} 更新商品
    //接收的傳參為url前端form內的網址admin/Commodity/{catCommoditygory}
    //為{Commodity}
    public function update($art_id){
        $input=Request()->except('_token','_method');
        $update = $this->CommodityService->update($art_id,$input);
        return $update;
    }


        //delete.admin/Commodity/{Commodity} 刪除單個商品
        public function destroy($art_id){
            $this->CommodityService->destroy($art_id);

    /*         if($re){
                $date=[
                    'status'=>0,
                    'msg'=>'商品刪除成功',
                ];
            }else{
                $date=[
                    'status'=>1,
                    'msg'=>'商品刪除失敗',
                ];
            }

            return $date;*/
        }



}
