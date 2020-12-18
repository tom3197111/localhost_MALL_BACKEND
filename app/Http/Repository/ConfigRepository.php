<?php

namespace App\Http\Repository;

use App\Http\Model\Config;

class ConfigRepository
{
    protected $Config;

    public function __construct()
    {
        $this->Config = new Config();

    }

    public function index()
    {
        $data=Config::orderBy('conf_order','asc')->get();

        return $data;
    }

    public function changecontent($input)
    {
        foreach($input['conf_id'] as $k=>$v){
            Config::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
    }
    public function putFile()
    {
            $config=Config::pluck('conf_content','conf_name')->all();
            return $config;
    }

    public function changeorder($input)
    {
            //從資料庫尋找從前端傳送過來的cate_id的資料
            $config=Config::find($input['conf_id']);
            //然後在指定cate_order欄位將從前端送來的資料輸入
            $config->conf_order=$input['conf_order'];
            //最後更新
            $re=$config->update();
            return $re;
    }
    public function store($input)
    {
        $re=Config::create($input);
        return $re;
    }
    public function edit($conf_id)
    {
        $field=Config::find($conf_id);
        return $field;
    }
    public function update($conf_id,$input)
    {
        $re=Config::where('conf_id',$conf_id)->update($input);
        return $re;
    }
    public function destroy($conf_id)
    {
        $re=Config::where('conf_id',$conf_id)->delete();
    }
}
