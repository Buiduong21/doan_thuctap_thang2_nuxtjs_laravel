<?php

namespace App\Repositories\Category;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getCategory($request);
    public function updateCategory($id, $request);
}