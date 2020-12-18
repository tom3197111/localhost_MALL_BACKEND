<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Navs;
use Illuminate\Support\Facades\Validator;
class NavsController extends Controller
{
        //get.admin/navs 全部自定義導航列表
        public function index(){
            
            $data=Navs::orderBy('nav_order','asc')->get();
            
           return view('admin.navs.index',compact('data'));
        }

        public function changeorder(){
                $input=Request()->all();
                //d($input);
                //從資料庫尋找從前端傳送過來的cate_id的資料       
                $navs=Navs::find($input['nav_id']);
                //然後在指定cate_order欄位將從前端送來的資料輸入
                $navs->nav_order=$input['nav_order'];
                //最後更新
                $re=$navs->update();
                //傳給前端的js來做跳出訊息的動作
                //如果更新成功則'status'=>0如果失敗 'status'=>1
                if($re){
                    $data=[
                        'status'=>0,
                        'msg'=>'自定義導航排序更新成功',
                    ];
                }else{
                      $data=[
                         'status'=>1,
                         'msg'=>'自定義導航排序失敗,請稍後重試',
                     ];
                }
                return $data;
             }

        //get.admin/navs/create 添加自定義導航
        public function create(){
                //找出所有cate_pid=0(父級分類)
                $data=[];
                //$data=Navs::where('nav_pid',0)->get();
                return view('admin.navs.add',compact('data'));
        }

        //post.admin/navs //添加自定義導航提交
        public function store(){
                //$input=Request()->all();
                //利用Request()->except('_token');
                //將前端傳來的csrf排除掉只接收其他的
                $input=Request()->except('_token');
                //dd($input);
        
                $rules=[
                        'nav_name'=>'required',
                        'nav_url'=>'required',
                        ];

                $message=[
                        'nav_name.required'=>'分類連接名稱不能為空',
                        'nav_url.required'=>'URL不能為空',
                        ];

                $validator=Validator::make($input,$rules,$message);
                //當$validator接收到的待驗證的資料與驗證規則成立(passes)
                //則執行下去
          
                if($validator->passes()){
                 $re=Navs::create($input);
                if($re){
                        return redirect('admin/navs');
                }else{
                        return back()->with('errors','自定義導航新增失敗');
                }            
                }else{
                return back()->withErrors($validator);
            
                }

        }

    //get.admin/navs/{navs}/edit 編輯自定義導航
    //進入編輯分類的頁面
    public function edit($nav_id){
        //找出所有cate_id的資料
        $field=Navs::find($nav_id);
        //dd($field);
        return view('admin.navs.edit',compact('field'));
    }     

    //put.admin/navs/{navs} 更新自定義導航
    //接收的傳參為url前端form內的網址admin/category/{category}
    //為{category}
    public function update($nav_id){
        //過濾接收到的資料裡面的_token 和 _method
        $input=Request()->except('_token','_method');
        //尋找cate_id為傳參送來的cate_id
        //例如where('欄位名稱',欄位ID)
        //找到後將接收到的資料更新
        $re=Navs::where('nav_id',$nav_id)->update($input);
        if($re){
            return redirect('admin/navs');
        }else{
            return back()->with('errors','自定義導航更新失敗');

        }
    }

        //delete.admin/navs/{navs} 刪除自定義導航
        public function destroy($nav_id){
                $re=Navs::where('nav_id',$nav_id)->delete();
        /*         if($re){
                    $date=[
                        'status'=>0,
                        'msg'=>'分類刪除成功',
                    ];
                }else{
                    $date=[
                        'status'=>1,
                        'msg'=>'分類刪除失敗',
                    ];
                }
               
                return $data; */
            }
        
}
