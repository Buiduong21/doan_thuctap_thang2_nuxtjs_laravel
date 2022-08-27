<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getProduct($request);
    public function createProduct($request);
    public function updateProduct($id, $request);
}