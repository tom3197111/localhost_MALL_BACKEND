<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Service\ConfigService;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    protected $ConfigService;
    public function __construct()
    {
        $this->ConfigService = new ConfigService();
    }
    //get.admin/config 全部配置項列表
    public function index(){
        //dd('23456');
        // dd(base_path());
        $data=$this->ConfigService->index();
       return view('admin.config.index',compact('data'));
    }
    public function changecontent(){
        $input=Request()->all();
        $this->ConfigService->changecontent($input);
        return back();
/*                return back()->with('errors','配置項更新成功');
*/
     }

    public function changeorder(){
            $input=Request()->all();
            $data = $this->ConfigService->changeorder($input);
            return $data;
         }
    //get.admin/config/create 添加配置項
    public function create(){
            //找出所有cate_pid=0(父級分類)
            //$data=Config::where('conf_pid',0)->get();
            return view('admin.config.add');
    }
    //post.admin/config //添加配置項提交
    public function store(){
            //$input=Request()->all();
            //利用Request()->except('_token');
            //將前端傳來的csrf排除掉只接收其他的
            $input = Request()->except('_token');
            $store = $this->ConfigService->store($input);
            return $store;
    }

    //get.admin/config/{config}/edit 編輯配置項
    //進入編輯分類的頁面
    public function edit($conf_id){
        //找出所有cate_id的資料
        $field=$this->ConfigService->edit($conf_id);
        //dd($field);
        return view('admin.config.edit',compact('field'));
    }

    //put.admin/config/{config} 更新配置項
    //接收的傳參為url前端form內的網址admin/category/{category}
    //為{category}
    public function update($conf_id){
        //過濾接收到的資料裡面的_token 和 _method
        $input=Request()->except('_token','_method');
        //尋找cate_id為傳參送來的cate_id
        //例如where('欄位名稱',欄位ID)
        //找到後將接收到的資料更新
        $update = $this->ConfigService->update($conf_id,$input);
        return $update;
    }

    //delete.admin/config/{config} 刪除配置項
    public function destroy($conf_id){
            $re = $this->ConfigService->destroy($conf_id);
    }




}
