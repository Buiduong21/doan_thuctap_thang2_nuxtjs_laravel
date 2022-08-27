<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Str;
use App\Services\ApiProductService;

class ApiProductController extends Controller
{
    protected $apiProductService;

    public function __construct(
        ApiProductService $apiProductService
    ) {
        $this->apiProductService = $apiProductService;
    }
    
    public function index()
    {
        $products = $this->apiProductService->getAll();
        return response()->json( $products);
    }

    public function store(Request $request)
    {
        $products = $this->apiProductService->createProduct($request);
        return response()->json($products);
    }
    
    public function show($id)
    {
        $product = $this->apiProductService->find($id);
        return response()->json( $product);
    }
}