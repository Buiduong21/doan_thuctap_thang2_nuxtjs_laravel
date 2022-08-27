<?php

namespace App\Services;

use App\Repositories\ApiCategory\ApiCategoryRepositoryInterface;

class ApiCategoryService extends BaseService
{
    public function getRepository()
    {
        return ApiCategoryRepositoryInterface::class;
    }
}