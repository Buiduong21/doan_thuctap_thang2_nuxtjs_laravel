<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(
        CategoryService $categoryService

    ) {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $data = $this->categoryService->getCategory($request);
        return view('admin.category.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:100|min:3'
        ], [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
            'name.max' => 'Tên danh mục được quá 100 kí tự',
            'name.min' => 'Tên danh mục tối thiểu 3 ký tự'
        ]);
        $this->categoryService->create($request->all());
        Session::flash('successs', 'Thêm danh mục thành công');
        return redirect('admin/category');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:3',
        ], [
            'name.required' => 'Tên danh mục không được để trống',
            'name.max' => 'Tên danh mục được quá 100 kí tự',
            'name.min' => 'Tên danh mục tối thiểu 3 ký tự',

        ]);
        $this->categoryService->updateCategory($id, $request);
        Session::flash('successs', 'Sửa danh mục thành công');
        return redirect('admin/category');
    }

    public function destroy($id)
    {
        $this->categoryService->categoryDelete($id);
        Session::flash('successs', 'Xóa danh mục thành công');
        return redirect('admin/category');
    }
}