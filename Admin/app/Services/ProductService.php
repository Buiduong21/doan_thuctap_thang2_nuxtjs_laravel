<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;

class ProductService extends BaseService
{
    public function getRepository()
    {
        return ProductRepositoryInterface::class;
    }
    public function getProduct($request)
    {
        return $this->repository->getProduct($request);
    }
    public function  createProduct($request)
    {
        return $this->repository->createProduct($request);
    }
    public function productDelete($id)
    {
        return $this->repository->delete($id);
    }
    public function productEdit($id)
    {
        return $this->repository->find($id);
    }
    public function updateProduct($id, $request)
    {
        return $this->repository->updateProduct($id, $request);
    }
}