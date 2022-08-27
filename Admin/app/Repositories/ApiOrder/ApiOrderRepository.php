<?php

namespace App\Repositories\ApiOrder;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use \App\Models\Order;
use \App\Models\OrderDetail;

class ApiOrderRepository extends BaseRepository implements ApiOrderRepositoryInterface
{
    //get the corresponding model
    public function getModel()
    {
        return Order::class;
    }

    public function createOrder($request)
    {
       $request->validate([
            'total'         => 'required',
            'customer_address'=> 'required',
            'customer_email'     => 'required',
            'customer_name'   => 'required',
            'customer_phone'   => 'required'
        ]);

        $data_order = [
            'total' => $request->total,
            'order_date' => date('Y-m-d H:i:s'),
            'order_number' => rand(1000, 9999),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_address' => $request->customer_address,
            'customer_phone' => $request->customer_phone
        ];
         
        $order = $this->model->create($data_order);

        $order_details = new OrderDetail;
        $carts = $request->myCart;
        $total = 0;
        $detail = [];
       
        foreach ($carts as $item) {
            $detail[] = [
                'product_id' => $item['id'],
                'total' => $item['price'] * $item['quantity'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

        }
        $order->products()->attach($detail);      
    }  
}