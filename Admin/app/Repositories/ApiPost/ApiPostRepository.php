<?php

namespace App\Repositories\ApiPost;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ApiPostRepository extends BaseRepository implements ApiPostRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Post::class;
    }
}