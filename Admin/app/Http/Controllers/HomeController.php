<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Product;

class HomeController extends Controller
{
    public function __construct(
        ProductService $productService

    ) {
        $this->productService = $productService;
    }

    public function homeAdmin()
    {
        return view('admin.homeAdmin');
    }
    // public function homedemo()
    // {
    //     return view('use.home');
    // }
    public function homeUse()
    {
        $data = $this->productService->getProduct();
        return view('use.home', ['data' => $data]);
    }
}