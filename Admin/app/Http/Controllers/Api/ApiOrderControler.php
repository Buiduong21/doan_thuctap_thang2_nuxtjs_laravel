<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\ApiOrderService;

class ApiOrderControler extends Controller
{
    protected $apiOrderService;

    public function __construct(
        ApiOrderService $apiOrderService

    ) {
        $this->apiOrderService = $apiOrderService;
    }
    
    public function index()
    {
      $order = $this->apiOrderService->getAll();
      return response()->json($order);
    }

    public function store(Request $request)
    {
        $order = $this->apiOrderService->createOrder($request);
        return response()->json($order);
    }
}
