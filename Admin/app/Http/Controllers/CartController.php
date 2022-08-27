<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CartService;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(
        CartService $cartService

    ) {
        $this->cartService = $cartService;
    }

    // Thêm sản phẩm lên giỏ hàng
    public function add($id, $quantity = 1)
    {
        $data = $this->cartService->addCart($id, $quantity = 1);
        return redirect()->route('cart.cartView');
    }

    // Hiển thị sản phẩm lên giỏ hàng
    public function view()
    {
        $carts = session('cart') ? session('cart') : [];
        return view('cart.cartView', compact('carts'));
    }

    // Xóa sản phẩm trong giỏ hàng
    public function delete($id)
    {
        $this->cartService->deleteCart($id);
        return redirect()->route('cart.cartView');
    }

    // Sưa số lượng sản phẩm trong giỏ hàng
    public function update($id)
    {
        $this->cartService->updateCart($id);
        return redirect()->route('cart.cartView');
    }

    // Xóa hết sản phẩm trong giỏ hàng
    public function clean()
    {
        session(['cart' => null]);
        return redirect()->route('cart.cartView');
    }

    // Hiển thị trang hóa đơn
    public function hoaDon()
    {
        $carts = session('cart') ? session('cart') : [];
        $customer = auth()->guard('')->check() ? auth()->guard('')->user() : null;
        return view('cart.hoaDon', compact('carts', 'customer'));
    }

    // Thêm hóa đơn vào bảng order và order-detail
    public function posthoaDon(Request $request)
    {
        $customer = auth()->guard('')->check() ? auth()->guard('')->user() : null;
        $carts = session('cart') ? session('cart') : [];
        $data = [
            'customer_address' => $request->customer_address,
            'customer_email' => $request->customer_email,
            'customer_name' =>  $request->customer_name,
            'customer_phone' =>  $request->customer_phone,
            'total' => $request->total,
            'order_date' => date('Y-m-d H:i:s'),
            'order_number' => rand(1000, 9999)
        ];

        if ($order = Order::create($data)) {
            $order_id = $order->id;
            foreach ($carts as  $item) {
                $detail = [
                    'order_id' => $order_id,
                    'quantity' => $item->quantity,
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'total' => ($item->quantity) * ($item->price),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                  ];
                OrderDetail::create($detail);
            }
        }
        session(['cart' => '']);
        return redirect()->route('cart.cartView');
    }
}