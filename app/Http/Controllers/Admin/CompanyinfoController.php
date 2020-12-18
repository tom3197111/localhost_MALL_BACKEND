<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Service\CompanyInfoService;

class CompanyinfoController extends CommonController
{
    protected $CompanyInfoService;

    public function __construct()
    {
        $this->CompanyInfoService = new CompanyInfoService();
    }
    public function index(){
        $data=$this->CompanyInfoService->get();
        // dd($Category);
        return view('admin.CompanyInfo.index',compact('data'));
    }

    //get.admin/companyinfo/{companyinfo}/edit 編輯分類
    //進入編輯分類的頁面
    public function edit($companyinfo_id){
        //找出所有cate_id的資料

        $field=$this->CompanyInfoService->editfind($companyinfo_id);
        //dd($field);
        return view('admin.CompanyInfo.edit',compact('field'));
    }
    //put.admin/companyinfo/{ID} 更新分類
    //接收的傳參為url前端form內的網址admin/companyinfo/{ID}
    public function update($id){
        //過濾接收到的資料裡面的_token 和 _method
        $input = Request()->except('_token','_method');
        $update = $this->CompanyInfoService->update($id,$input);
        return $update;
    }


}
