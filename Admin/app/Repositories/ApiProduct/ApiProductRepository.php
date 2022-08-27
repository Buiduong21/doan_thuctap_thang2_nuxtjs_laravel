<?php

namespace App\Repositories\ApiProduct;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Models\Product;

class ApiProductRepository extends BaseRepository implements ApiProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }
    
    public function createProduct($request)
    {
        $request->validate([
            'code'         => 'required',
            'name'          => 'required|min:3',
            'category_id'   => 'required|integer',
            'desr'   => 'required',
            'image'     => 'image|mimes:jpeg,png|mimetypes:image/jpeg,image/png|max:2048',
            'price'   => 'required|integer'
        ]);
        
        $products = new Product;
        $products->fill($request->all());
        $products->save();
        return $products;
    }
}