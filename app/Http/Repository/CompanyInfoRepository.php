<?php

namespace App\Http\Repository;

use App\Http\Model\CompanyInfo;
class CompanyInfoRepository
{
    protected $User;

    public function __construct()
    {
        $this->companyInfo = new CompanyInfo();


    }

    public function get()
    {
        $companyinfo = CompanyInfo::get();
        return $companyinfo;
    }

    public function find($companyinfo_id){
        $field = CompanyInfo::find($companyinfo_id);

        return $field;
    }

    public function update($id,$input)
    {
       $re = CompanyInfo::where('id',$id)->update($input);
       return $re;
    }
}
