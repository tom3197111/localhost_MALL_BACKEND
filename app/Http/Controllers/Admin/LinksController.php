<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Links;
use Illuminate\Support\Facades\Validator;
class LinksController extends Controller
{
        //get.admin/links 全部友情連接列表
        public function index(){
            
            $data=Links::orderBy('link_order','asc')->get();
            
           return view('admin.links.index',compact('data'));
        }

        public function changeorder(){
                $input=Request()->all();
                //d($input);
                //從資料庫尋找從前端傳送過來的cate_id的資料       
                $links=Links::find($input['link_id']);
                //然後在指定cate_order欄位將從前端送來的資料輸入
                $links->link_order=$input['link_order'];
                //最後更新
                $re=$links->update();
                //傳給前端的js來做跳出訊息的動作
                //如果更新成功則'status'=>0如果失敗 'status'=>1
                if($re){
                    $data=[
                        'status'=>0,
                        'msg'=>'友情連接排序更新成功',
                    ];
                }else{
                      $data=[
                         'status'=>1,
                         'msg'=>'友情連接排序失敗,請稍後重試',
                     ];
                }
                return $data;
             }

        //get.admin/links/create 添加友情連接
        public function create(){
                //找出所有cate_pid=0(父級分類)
                $data=[];
                //$data=Links::where('link_pid',0)->get();
                return view('admin.links.add',compact('data'));
        }

        //post.admin/links //添加友情連接提交
        public function store(){
                //$input=Request()->all();
                //利用Request()->except('_token');
                //將前端傳來的csrf排除掉只接收其他的
                $input=Request()->except('_token');
                //dd($input);
        
                $rules=[
                        'link_name'=>'required',
                        'link_url'=>'required',
                        ];

                $message=[
                        'link_name.required'=>'分類連接名稱不能為空',
                        'link_url.required'=>'URL不能為空',
                        ];

                $validator=Validator::make($input,$rules,$message);
                //當$validator接收到的待驗證的資料與驗證規則成立(passes)
                //則執行下去
          
                if($validator->passes()){
                 $re=Links::create($input);
                if($re){
                        return redirect('admin/links');
                }else{
                        return back()->with('errors','友情連接新增失敗');
                }            
                }else{
                return back()->withErrors($validator);
            
                }

        }

    //get.admin/links/{links}/edit 編輯友情連接
    //進入編輯分類的頁面
    public function edit($link_id){
        //找出所有cate_id的資料
        $field=Links::find($link_id);
        //dd($field);
        return view('admin.links.edit',compact('field'));
    }     

    //put.admin/links/{links} 更新友情連接
    //接收的傳參為url前端form內的網址admin/category/{category}
    //為{category}
    public function update($link_id){
        //過濾接收到的資料裡面的_token 和 _method
        $input=Request()->except('_token','_method');
        //尋找cate_id為傳參送來的cate_id
        //例如where('欄位名稱',欄位ID)
        //找到後將接收到的資料更新
        $re=Links::where('link_id',$link_id)->update($input);
        if($re){
            return redirect('admin/links');
        }else{
            return back()->with('errors','友情連接更新失敗');

        }
    }

        //delete.admin/links/{links} 刪除友情連接
        public function destroy($link_id){
                $re=Links::where('link_id',$link_id)->delete();
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
