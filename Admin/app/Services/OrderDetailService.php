<?php

namespace App\Services;

use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;

class OrderDetailService extends BaseService
{
    public function getRepository()
    {
        return OrderDetailRepositoryInterface::class;
    }
    public function getOrderDetailData()
    {
        return $this->repository->getOrderDetailData();
    }
}