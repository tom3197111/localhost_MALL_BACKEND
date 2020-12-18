<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table='Commodity';
    protected $primaryKey='art_id';
    public $timestamps  =false;
    protected $guarded =[];
}
