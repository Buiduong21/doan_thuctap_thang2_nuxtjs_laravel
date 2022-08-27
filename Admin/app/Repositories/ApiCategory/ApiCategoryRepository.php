<?php

namespace App\Repositories\ApiCategory;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ApiCategoryRepository extends BaseRepository implements ApiCategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }
}