<?php

namespace App\Services;

use App\Repositories\ApiProfile\ApiProfileRepositoryInterface;

class ApiProfileService extends BaseService
{
    public function getRepository()
    {
        return ApiProfileRepositoryInterface::class;
    }
    public function createProfile($request)
    {
        return $this->repository->createProfile($request);
    }

    public function showProfile($id) {
        return $this->repository->showProfile($id);
    }
}