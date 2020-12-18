<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Service\CategoryService;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;
class CategoryController extends CommonController
{
    protected $CategoryService;

    public function __construct()
    {
        $this->CategoryService = new CategoryService();
    }
    //get.admin/category 全部分類列表
    public function index(){
        // dd("A");
        $data=$this->CategoryService->tree();
       // dd($categorys);
       return view('admin.category.index')->with('data',$data);
    }

    public function changeorder(){
       $input=Request()->all();
       //d($input);
       //從資料庫尋找從前端傳送過來的cate_id的資料並將前端送來的資料處理並更新
       $data=$this->CategoryService->changeorder($input);

       return $data;
    }


    //get.admin/category/create 添加分類
    public function create(){
        $data=$this->CategoryService->create();
        return view('admin.category.add',compact('data'));
    }

    //post.admin/category //添加分類提交
    public function store(){
        //$input=Request()->all();
        //利用Request()->except('_token');
        //將前端傳來的csrf排除掉只接收其他的

        $input=Request()->except('_token');
        $validator=$this->CategoryService->store($input);
        return $validator;

    }
    //get.admin/category/{category}/edit 編輯分類
    //進入編輯分類的頁面
    public function edit($cate_id){
        //找出所有cate_id的資料
        $field=$this->CategoryService->editfind($cate_id);
        //找出所有cate_pid=0
        $data=$this->CategoryService->create();
        //dd($field);
        return view('admin.category.edit',compact('field','data'));
    }

    //put.admin/category/{category} 更新分類
    //接收的傳參為url前端form內的網址admin/category/{category}
    //為{category}
    public function update($cate_id){
        //過濾接收到的資料裡面的_token 和 _method
        $input = Request()->except('_token','_method');
        $update = $this->CategoryService->update($cate_id,$input);
        return $update;
    }


    //get.admin/category/{category} 顯示單個分類信息
    public function show(){

    }
    //delete.admin/category/{category} 刪除單個分類
    public function destroy($cate_id){
        $data = $this->CategoryService->destroy($cate_id);

        return $data;
    }


}
