<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use App\Traits\StorageImage;
use Illuminate\Support\Facades\Storage;


class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getCategory($request)
    {
        $categorys = $this->model->paginate(5);
        if($request->key){
            $key = $request->key;
            $categorys = $this->model->where('name','ILIKE','%'.$key.'%')->paginate(5);
        }
        return $categorys;
    }

    public function updateCategory($id, $request)
    {
        $category =  $this->model->find($id);
        $dataInsert = [
            'name' => $request->name
        ];
        return $category->update($dataInsert);
    }
}
