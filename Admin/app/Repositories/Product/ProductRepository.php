<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use App\Traits\StorageImage;
use Illuminate\Support\Facades\Storage;


class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getProduct($request)
    {
        $products = $this->model->paginate(5);
        if($request -> key){
            $key = $request ->key;
            $products = $this->model->where('name','ILIKE', '%'. $key .'%')
            ->orWhere('price', 'ILIKE', '%'. $key .'%')
            ->paginate(5);  
        }
        return $products;
    }

    public function createProduct($request)
    {
        $dataInsert = [
            'code' => $request->code,
            'name' => $request->name,
            'desr' =>  $request->desr,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
        ];

        $getImage = $request->file('image');

        if ($getImage) {
            $nameImage = $getImage->getClientOriginalName();
            $newNameImage = time() . $nameImage;
            $getImage->move('upload', $newNameImage);
        } else {
            $newNameImage = '';
        }
       
        $dataInsert['image'] = $newNameImage;
        $tags = $request->tag;
        $product = $this->model->create($dataInsert);
         
        $product->tags()->sync($tags);
        return $product;
    }

    public function updateProduct($id, $request)
    {
        $product =  $this->model->find($id);
        $dataInsert = [
            'code' => $request->code,
            'name' => $request->name,
            'desr' =>  $request->desr,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
        ];

        $getImage = $request->file('image');

        if ($getImage) {
            $nameImage = $getImage->getClientOriginalName();
            $newNameImage = time() . $nameImage;
            $getImage->move('upload', $newNameImage);
        } else {
            $newNameImage = $product->image;
        }

        $dataInsert['image'] = $newNameImage;
        
        $product->update($dataInsert);
        $tags = $request->tag;
        $product->tags()->sync($tags);
        return $product;
    }
}