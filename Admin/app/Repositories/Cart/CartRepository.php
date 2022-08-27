<?php

namespace App\Repositories\Cart;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use App\Traits\StorageImage;
use Illuminate\Support\Facades\Storage;
use App\Model\Product;


class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function addCart($id, $quantity = 1)
    {
        $carts = session('cart') ? session('cart') : [];
        if (isset($carts[$id])) {
            $carts[$id]->quantity += $quantity;
        } else {
            $pro = $this->model::find($id);
            $item = new \stdClass();
            $item->id = $pro->id;
            $item->name = $pro->name;
            $item->slug = $pro->slug;
            $item->price = $pro->price;
            $item->image = $pro->image;
            $item->desr = $pro->desr;
            $item->code = $pro->code;
            $item->quantity = $quantity;
            $carts[$id] = $item;
        }
        session(['cart' => $carts]);
    }
    public function deleteCart($id)
    {
        $carts = session('cart') ? session('cart') : [];
        if (isset($carts[$id])) {
            unset($carts[$id]);
            session(['cart' => $carts]);
        }
    }
    public function updateCart($id)
    {
        $quantity = request('quantity', 1);
        $carts = session('cart') ? session('cart') : [];
        if (isset($carts[$id])) {
            $carts[$id]->quantity = $quantity;
            session(['cart' => $carts]);
        }
    }
}
