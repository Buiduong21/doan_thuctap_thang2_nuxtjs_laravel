<?php

namespace App\Services;

use App\Repositories\Order\OrderRepositoryInterface;

class OrderService extends BaseService
{
    public function getRepository()
    {
        return OrderRepositoryInterface::class;
    }
    public function getOrderData($request)
    {
        return $this->repository->getOrderData($request);
    }
    public function orderDelete($id)
    {
        return $this->repository->delete($id);
    }
}