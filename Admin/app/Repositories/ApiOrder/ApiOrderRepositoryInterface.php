<?php

namespace App\Repositories\ApiOrder;

use App\Repositories\RepositoryInterface;

interface ApiOrderRepositoryInterface extends RepositoryInterface
{
    public function createOrder(Request $request);  
}