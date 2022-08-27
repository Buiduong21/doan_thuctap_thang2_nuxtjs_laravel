<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Traits\StorageImage;
use Illuminate\Support\Facades\Storage;
use App\Services\ProductService;

class ProductController extends Controller
{

    use StorageImage;
    protected $productService;

    public function __construct(
        ProductService $productService

    ) {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $data = $this->productService->getProduct($request);
        return view('admin.product.index', ['data' => $data]);
    }
    public function create()
    {
        $tags = Tag::all();
        $cat = Category::orderBy('name', 'ASC')->get();
        return view('admin.product.create', compact('cat','tags'));
    }
    public function store(Request $request)
    {
        $this->productService->createProduct($request);
        Session::flash('successs', 'Sửa tin tức thành công');
        return redirect('admin/product');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = $this->productService->productEdit($id);
        $cat = Category::orderBy('id', 'ASC')->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.product.edit', compact('product', 'cat', 'categories','tags'));
    }

    public function update($id, Request $request)
    {

        // $request->validate([
        //     'code'         => 'required',
        //     'name'          => 'required',
        //     'category_id'   => 'required|integer',
        //     'description'   => 'required',
        //     'image'     => 'image|mimes:jpeg,png|mimetypes:image/jpeg,image/png|max:2048',
        //     'price'   => 'required|integer',
        // ], [
        //     'name.required' => 'Tên danh mục không được để trống',
        //     'name.max' => 'Tên danh mục được quá 100 kí tự',
        //     'name.min' => 'Tên danh mục tối thiểu 3 ký tự',
        // ]);
        $this->productService->updateProduct($id, $request);
        Session::flash('successs', 'Sửa danh mục thành công');
        return redirect('admin/product');
    }

    public function destroy($id)
    {
        $this->productService->productDelete($id);
        Session::flash('successs', 'Xóa danh mục thành công');
        return redirect('admin/product');
    }
}
