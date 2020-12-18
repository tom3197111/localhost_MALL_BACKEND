<?php

namespace App\Http\Service;

use App\Http\Repository\ConfigRepository;
use Illuminate\Support\Facades\Validator;
class ConfigService
{
    protected $ConfigRepository;

    public function __construct()
    {
        $this->ConfigRepository = new ConfigRepository();
    }

    public function index()
    {
         $data = $this->ConfigRepository->index();

            foreach($data as $k=>$v){
                switch($v->field_type){
                    case 'input';
                      //echo '單行文本<br>';
                      $data[$k]->_html='<input class="lg" type="text" name="conf_content[]" value="'.$v->conf_content.'">';
                      break;
                    case 'textarea';
                      //echo '多行文本<br>';
                      $data[$k]->_html='<textarea  class="lg" type="text" name="conf_content[]">'.$v->conf_content.'</textarea>';
                      break;
                    case 'radio';
                      //1|開啟 , 0|關閉
                      //拆開以單引號內的植來做決定要用什麼來拆開
                      //例如explode(',',$v->field_value)是以 ,
                      //explode(',p',$v->field_value) 是以,p
                      $arr=explode(',',$v->field_value);

                      //1|開啟
                      //0|關閉
                      $str='';
                      foreach($arr as $m=>$n){
                        $r=explode('|',$n);
                        //1|開啟
/*                         $c='';
                        if($v->conf_content==$r[0]){
                             $c='checked';
                        } */
                        $c=$v->conf_content==$r[0]?'checked':'';
                        $str.='<input type="radio" name="conf_content[]" value="'.$r[0].'"'.$c.'>'.$r[1].'　';
                        $data[$k]->_html= $str;

                      }

                      break;
                }
            }
         return $data;
    }

    public function changecontent($input){
        $this->ConfigRepository->changecontent($input);
        $this->putFile();
    }
    public function putFile(){
        //echo \Illuminate\Support\Facades\Config::get('web.web_title');
        $config = $this->ConfigRepository->putFile();
        //使用var_export(資料,true)
        //讓讀取的資料可以用讓PHP讀取 而true是讓他不打印但是資料還是有返回
        //如果直接用echo 來讀$config 會亂碼
        //echo var_export($config,true);
        //base_path() 這個函數會將專案目錄的路徑顯示出來
        //例如此專案的目錄位置C:\wamp64\www\falcon
        // $path=base_path().'\config\web.php';
        $path='\xampp\htdocs\Mall\config\web.php';
        $str='<?php return '.var_export($config,true).';';
        //file_put_contents()將參數寫入某個文件
        //file_put_contents(文件所在路徑,需要寫入的資料)
        file_put_contents($path,$str);
        //echo $path;
    }

    public function changeorder($input){
        $re=$this->ConfigRepository->changeorder($input);
        if($re){
        $data=[
                'status'=>0,
                'msg'=>'配置項排序更新成功',
                    ];
        }else{
        $data=[
                'status'=>1,
                'msg'=>'配置項排序失敗,請稍後重試',
                     ];
        }
        return $data;
    }
    public function store($input){
        $rules=[
                'conf_name'=>'required',
                'conf_title'=>'required',
                ];
        $message=[
                'conf_name.required'=>'配置項名稱不能為空',
                'conf_title.required'=>'配置項標題不能為空',
                ];
        $validator=Validator::make($input,$rules,$message);
        //當$validator接收到的待驗證的資料與驗證規則成立(passes)
        //則執行下去
        if($validator->passes()){
         $re=$this->ConfigRepository->store($input);
        if($re){
                return redirect('admin/config');
        }else{
                return back()->with('errors','配置項新增失敗');
        }
        }else{
        return back()->withErrors($validator);
        }
    }
    public function edit($conf_id){
        $field = $this->ConfigRepository->edit($conf_id);
        return $field;
    }
    public function update($conf_id,$input){
        $re = $this->ConfigRepository->update($conf_id,$input);
        if($re){
            $this->putFile();
            return redirect('admin/config');
        }else{

            return back()->with('errors','配置項更新失敗');

        }
    }
    public function destroy($conf_id){
        $this->ConfigRepository->destroy($conf_id);
        $this->putFile();
    }
}
