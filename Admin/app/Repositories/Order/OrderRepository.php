<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Order::class;
    }
    public function getOrderData($request)
    {
        $data = $this->model->paginate(8);
        if($request -> key){
            $key = $request ->key;
            $data = $this->model->where('customer_name','ILIKE','%'. $key .'%')
            ->orWhere('total','ILIKE', '%'. $key .'%')
            ->orWhere('customer_email', 'ILIKE', '%'. $key .'%')
            ->orWhere('customer_address', 'ILIKE', '%'. $key .'%')
            ->orWhere('customer_phone', 'ILIKE', '%'. $key .'%')
            ->paginate(5);  
        }
        return $data;
    }
}
