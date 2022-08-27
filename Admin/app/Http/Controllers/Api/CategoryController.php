<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryStore;
use App\Services\ApiCategoryService;

class CategoryController extends Controller
{  
    protected $apiCategoryService;

    public function __construct(
        ApiCategoryService $apiCategoryService

    ) {
        $this->apiCategoryService = $apiCategoryService;
    }
    
    public function index()
    {
      $category = $this->apiCategoryService->getAll();
      return response()->json($category);
    }
 
    public function store(CategoryStore $request)
    {
      $data = $request->validated();
      return Category::create($data);
    }

    public function show($id)
    {
      $category = Category::find($id);
      return response()->json($category);
    }

    public function update($id, Request $request)
    {
      $category = Category::find($id); 
      $category->name = $request->name;
      $category->save();
      return response()->json($category);
    }
 
    public function destroy(Category $category, $id)
    {
      $category = Category::find($id);
      $category->delete();
    }
}