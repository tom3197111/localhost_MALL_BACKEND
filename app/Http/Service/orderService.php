<?php

namespace App\Http\Service;

use App\Http\Repository\orderRepository;

class orderService
{
    protected $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new orderRepository();
    }

    public function getOrder()
    {
       $getOrder = $this->orderRepository->getOrder();

       return $getOrder;
    }
    public function get_order_commodity_item_Service()
    {
       $getOrder = $this->orderRepository->get_order_commodity_item_Repository();

       return $getOrder;
   }
   public function search_order_Service($payment_number,$search_type){
    if($search_type['search_type']=='search_order_id'){
        $search='payment_number';
    }elseif($search_type['search_type']=='search_shshopping_cart_order'){
        $search='user_id';
    }elseif($search_type['search_type']=='order_commodity_item'){
        $search='order_id';
        $getOrder = $this->orderRepository->order_commodity_item_Repository($payment_number,$search);
        return $getOrder;
    }elseif ($search_type['search_type']=='payment_number') {
        $search='payment_number';
        $order_shipping = $this->orderRepository->order_shipping_Repository($payment_number,$search);
        $getOrder = $this->orderRepository->search_order_Repository($payment_number,$search);
        $order_shipping_cart = $this->orderRepository->order_commodity_item_Repository($payment_number,$search);
        if(!$order_shipping->isEmpty() && !$order_shipping_cart->isEmpty()){
            $collection = collect([$getOrder,$order_shipping,$order_shipping_cart]);
            $collapsed = $collection->collapse();
            $collapsed=$collapsed->all();


            return $collapsed;
        }
    }

    $getOrder = $this->orderRepository->search_order_Repository($payment_number,$search);


    return $getOrder;

    
}

}
