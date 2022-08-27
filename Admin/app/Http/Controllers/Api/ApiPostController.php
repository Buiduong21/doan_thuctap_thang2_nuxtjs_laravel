<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\ApiPostService;

class ApiPostController extends Controller
{
    protected $apiPostService;

    public function __construct(
        ApiPostService $apiPostService
    ) {
        $this->apiPostService = $apiPostService;
    }
    
    public function index()
    {
    $post = $this->apiPostService->getAll();
    return response()->json( $post);
    }
}