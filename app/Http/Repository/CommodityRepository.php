<?php

namespace App\Http\Repository;

use App\Http\Model\Commodity;
use App\Http\Model\Category;
use Illuminate\Http\Request;
class CommodityRepository
{
    protected $Model;

    public function __construct()
    {
        $this->User = new Commodity();
        $this->User = new Category();
    }

    public function index()
    {
        $data = Commodity::orderBy('art_id','desc')->paginate(10);

        return $data;
    }

    public function store($input){
        $re = Commodity::create($input);

        return $re;
    }
    public function edit($art_id){
        $field = Commodity::find($art_id);

        return $field;
    }
    public function update($art_id,$input){
        $re = Commodity::where('art_id',$art_id)->update($input);

        return $re;
    }

    public function rules($art_id){
        $rules = Commodity::where('art_id',$art_id)->get();
        return $rules;
    }
    public function destroy($art_id){
        $rules=Commodity::where('art_id',$art_id)->get();
        $re=Commodity::where('art_id',$art_id)->delete();

        return $rules;
    }
}
