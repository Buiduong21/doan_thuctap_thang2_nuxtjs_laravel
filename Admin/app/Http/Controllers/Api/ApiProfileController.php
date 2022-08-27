<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiProfileService;

class ApiProfileController extends Controller
{
    protected $apiProfileService;

    public function __construct(
        ApiProfileService $apiProfileService

    ) {
        $this->apiProfileService = $apiProfileService;
    }
    
    public function index()
    {
        dd(111);
    }

    public function store(Request $request)
    {
        $profile = $this->apiProfileService->createProfile($request);
        return response()->json($profile);
    }
   
    public function show($id){
        $profile = $this->apiProfileService->showProfile($id);
        return response()->json($profile);
    }
}
