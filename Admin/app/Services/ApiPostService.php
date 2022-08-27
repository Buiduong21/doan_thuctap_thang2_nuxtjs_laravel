<?php

namespace App\Services;

use App\Repositories\ApiPost\ApiPostRepositoryInterface;

class ApiPostService extends BaseService
{
    public function getRepository()
    {
        return ApiPostRepositoryInterface::class;
    }
}