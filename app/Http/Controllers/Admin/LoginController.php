<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Http\Model\User;

//驗證碼的類引入
// require_once 'resources/org/code/Code.class.php';
//由於建立了公用控制所以繼承CommonController就可以都用到了
class LoginController extends CommonController
{
    //
    public function login(){
        // phpinfo();
        //接收所有請求
        if($input = Request()->all()){

            //建立新驗證碼 並將驗證碼存入session內
            //因為Code是底層的所以需要加\

            // $code = new \Code;
            //取得session內的驗證碼
            // $_code = $code->get();
                //將產生的驗證碼與Session內的做比對
                //strtoupper將接收到的數轉換成大寫
            //  if(strtoupper($input['code'])!=$_code){
            //     //回到前一個請求的頁面
            //     //並傳回參數with('KEY','VALUE')
            //     return back()->with('msg','驗證碼錯誤');
            // }
            // $user=User::all(); 取出的陣列格式跟first不同 first可以直接用id來呼叫
            $user_account=User::where('name','=',$input['user_name'])->get();
            foreach ($user_account as $user_data) {
                $password = $user_data->password;
                $account = $user_data->name;
            }
            if($password !=$input['user_pass'] || $account !=$input['user_name'] )
            {
                return back()->with('msg','帳號或密碼錯誤');
            }
            session(['user'=>$account]);
                //dd(session('user'));
                 //redirect 跳轉
                 //從當前跳轉到admin
                return  redirect('admin');

        }else{

             //如果沒接收到東西就跳到view文件夾內的admin文件夾內的login
            return view('admin.login');
        }
    }
    public function quit()
    {
        //如果登入信息錯誤 將session清空
        session(['user'=>null]);
        return redirect('/');


    }
    //這個function因為前端有接收驗證碼的url 所以每次進去該前端頁面
    //都會執行一次路由該路由在執行這個function
    // public function code(){

    //     $code =new \Code;

    //     $code->make();
    // }

    public function crypt(){

        $str='123456';
        //加密
        $str=Crypt::encrypt($str);
        echo $str;
        echo "</br>";
        //解密
        $str=Crypt::decrypt($str);
        echo $str;
    }

}
