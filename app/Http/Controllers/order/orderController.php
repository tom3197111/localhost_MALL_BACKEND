<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\orderService; 
class orderController extends Controller
{

    protected $orderService;

    public function __construct()
    {
        $this->orderService = new orderService();
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_data=$this->orderService->getOrder();
        $order_commodity_item=$this->orderService->get_order_commodity_item_Service();
        // dd($order_commodity_item);
        return view('admin.order.index',compact('order_data','order_commodity_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($payment_number)
    {   
        $search_type= Request()->all();
        $order_data =$this->orderService->search_order_Service($payment_number,$search_type);
        $order_data =json_encode($order_data);
        // $order=$order_data->toJson();
        echo $order_data;
        // return view('admin.order.index',compact('order_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
