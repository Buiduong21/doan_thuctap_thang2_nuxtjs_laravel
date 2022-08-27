<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\OrderService;
use Session;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(
        OrderService $orderService
    ) {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $orders = $this->orderService->getOrderData($request);
        return view('admin.orders.index', ['orders' => $orders]);
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
    public function show($id)
    {
        //
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

    public function destroy($id)
    {
        $this->orderService->orderDelete($id);
        Session::flash('successs', 'Xóa đơn hàng thành công');
        return redirect('admin/orders');
    }
}
