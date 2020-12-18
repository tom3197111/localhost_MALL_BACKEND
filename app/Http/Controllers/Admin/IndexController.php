<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Service\IndexService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
class IndexController extends CommonController
{
    protected $IndexService;

    public function __construct()
    {
        $this->IndexService = new IndexService();
    }

    public function index(){
      
        return view('admin.index');

    }
    public function info(){

        return view('admin.info');

    }
    //更改密碼
    public function pass()
    {
        if($input=Request()->all()){
            $rules=[
                //required是不能為空的意思 需要有東西
                //between:6,20而且必須要在6到20個字元之間
                //前端的再次輸入密碼的name為password_confirmation
                //confirmed會自動與前端password_confirmation做匹配
                //因為'confirmed'是要確認是否相同
                //所以password是原本的password_confirmed則是要做比對的
                'password'=>'required|between:6,20|confirmed',
            ];
            //當發生password required時給的錯誤訊息
          $message=[
            'password.required'=>'新密碼不能為空',
            'password.between'=>'新密碼必須在6-20位之間',
            'password.confirmed'=>'新密碼和確認密碼不一樣',
          ];
//傳入 make 方法Illuminate\Database\QueryException的第一個參數是待驗證的資料，第二個參數是資料的驗證規則。
//第三個是設定錯誤信息
          $validator=Validator::make($input,$rules,$message);
          //當$validator接收到的待驗證的資料與驗證規則成立(passes)
          //則執行下去

          if($validator->passes()){
              //透過model取出資料庫的資料
              //取出單筆 目前資料庫只有一筆
            $user=$this->IndexService->getUser();
              //將資料庫user_pass欄的密碼解碼
              // $_password=Crypt::decrypt($user->user_pass);
              //$_password=$user->user_pass;
              //echo $_password;
              //如果前端送來USER輸入的原密碼與剛剛從資料庫取得的密碼相同
              if($input['password_o'] == $user->password){
                //將前端user輸入的新密碼加碼(Crypt::encrypt)後設為指定user_pass欄
                // $user->user_pass = Crypt::encrypt($input['password']);
                $user->password = $input['password'];
                //在進行更新

                $user->update();

                //return back()->with('errors','原密碼更新成功');
                $errors='原密碼更新成功';
                return view('admin/pass',compact('errors'));

              }else{
                $errors='原密碼錯誤';
                return view('admin/pass',compact('errors'));

                //return back()->with('errors','原密碼錯誤');
              }
          }else{
              //當 $validator發生errors找到全部(ALL)的錯誤
            //dd($validator->errors()->all());
            //退回(back)發送請求的該頁面並且將錯誤訊息一起傳送過去(withErrors($validator))
            //dd(back()->withErrors($validator));

            $errors=$validator->messages();

            return back()->withErrors($validator);
            $errors='原密碼錯誤';
            return view('admin/pass',compact('errors'));



          }

        }else{
            return view('admin.pass');
        }

    }
}
