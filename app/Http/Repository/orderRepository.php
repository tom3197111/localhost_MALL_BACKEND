<?php

namespace App\Http\Repository;

use App\Http\Model\order;
use App\Http\Model\order_shipping;
use App\Http\Model\order_commodity_item;
class orderRepository
{
    protected $Order;
    protected $order_shipping;
    protected $order_commodity_item;
    
    public function __construct()
    {
        $this->Order = new order();
        $this->order_shipping = new order_shipping();
        $this->order_commodity_item = new order_commodity_item();
    }

    public function getOrder()
    {
        $order=order::get();

        return $order;
    }
    public function get_order_commodity_item_Repository()
    {
        $order=order_commodity_item::get();
        return $order;
    }
    public function search_order_Repository($payment_number,$search)
    { 
        $order=order::where($search,'=',$payment_number)->get();

        return $order;
    }
    public function order_shipping_Repository($payment_number,$search){

        $order=order_shipping::where($search,'=',$payment_number)->get();

        return $order;
    }
    public function order_commodity_item_Repository($payment_number,$search){

        $order=order_commodity_item::where($search,'=',$payment_number)->get();

        return $order;
    }

}
