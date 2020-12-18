<?php

namespace App\Http\Controllers\Admin;

use App\Http\Service\BannerService;
use App\Http\Service\client_Login_System_Service;
use Illuminate\Http\Request;
use App\Http\Model\User;

class client_Login_SystemController extends CommonController
{   
    protected $BannerService;
    protected $client_Login_System_Service;
    public function __construct()
    {
        $this->BannerService = new BannerService();
        $this->client_Login_System_Service = new client_Login_System_Service();
    }

    
    //get.admin/client_Login_System
    public function index(){
        $data = $this->BannerService->index();
        return view('admin.client_Login_System.index',compact('data'));
    }


    //get.admin/client_Login_System/{client_Login_System}/edit
    //進入編輯分類的頁面
    public function edit($id){

        $field =$this->BannerService->edit($id);

        return view('admin.client_Login_System.edit',compact('field'));
    }


     //put.admin/client_Login_System/{client_Login_System} 
    public function update($id){
        $input=Request()->except('_token','_method');
         $update = $this->client_Login_System_Service->upload($input);
        return $update;
    }


}
