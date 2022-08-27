<?php

namespace App\Services;

use App\Repositories\Cart\CartRepositoryInterface;

class CartService extends BaseService
{
    public function getRepository()
    {
        return CartRepositoryInterface::class;
    }

    public function addCart($id, $quantity = 1)
    {
        return $this->repository->addCart($id, $quantity = 1);
    }
    public function deleteCart($id)
    {
        return $this->repository->deleteCart($id);
    }
    public function updateCart($id)
    {
        return $this->repository->updateCart($id);
    }
    
}
