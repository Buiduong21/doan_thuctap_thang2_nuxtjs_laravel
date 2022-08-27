<?php

namespace App\Services;

use App\Repositories\ApiOrder\ApiOrderRepositoryInterface;

class ApiOrderService extends BaseService
{
    public function getRepository()
    {
        return ApiOrderRepositoryInterface::class;
    }
    
    public function createOrder($request){
        return $this->repository->createOrder($request);
    }  
}