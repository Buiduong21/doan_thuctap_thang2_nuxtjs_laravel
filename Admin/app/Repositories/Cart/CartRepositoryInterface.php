<?php

namespace App\Repositories\Cart;

use App\Repositories\RepositoryInterface;

interface CartRepositoryInterface extends RepositoryInterface
{
    public function addCart($id, $quantity = 1);
    public function deleteCart($id);
    public function updateCart($id);
}
