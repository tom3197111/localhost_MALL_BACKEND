<?php

namespace App\Http\Repository;

use App\Http\Model\banner;

class BannerRepository
{
    protected $Category;

    public function __construct()
    {
        $this->banner = new banner();

    }

    public function index()
    {
        $banner = banner::orderBy('id','asc')->get();
        return $banner;
    }
    public function edit($id){
        $field = banner::find($id);
        return $field;

    }




    public function store($id,$input)
    {   
        
        $re=banner::where('id',$id)->update($input);

        return $re;
    }


}
