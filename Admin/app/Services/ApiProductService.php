<?php

namespace App\Services;

use App\Repositories\ApiProduct\ApiProductRepositoryInterface;
use Illuminate\Http\Request;


class ApiProductService extends BaseService
{
    public function getRepository()
    {
        return ApiProductRepositoryInterface::class;
    }

    public function createProduct(Request $request){
        return $this->repository->createProduct($request);
    }  
}