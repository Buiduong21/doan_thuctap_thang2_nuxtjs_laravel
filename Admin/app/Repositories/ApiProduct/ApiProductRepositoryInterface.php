<?php

namespace App\Repositories\ApiProduct;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;


interface ApiProductRepositoryInterface extends RepositoryInterface
{
    public function createProduct(Request $request);
}