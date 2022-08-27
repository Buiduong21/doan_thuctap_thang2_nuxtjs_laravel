<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService extends BaseService
{
    public function getRepository()
    {
        return CategoryRepositoryInterface::class;
    }

    public function getCategory($request)
    {
        return $this->repository->getCategory($request);
    }

    public function updateCategory($id, $request)
    {
        return $this->repository->updateCategory($id, $request);
    }

    public function categoryDelete($id)
    {
        return $this->repository->delete($id);
    }
}