<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\ProductService;

class CartController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return __METHOD__;
    }

    public function store($id)
    {
        try {
            $product = $this->productService->findById($id);
            $cart = Session::get('cart') ?? collect();
            if (($cart->count()) > 0) {
                $productInCart = $cart->where('id', $id)->first();
                if ($productInCart == null){
                    $product['quantity'] = 1;
                } else{
                    $productInCart['quantity'] += 1;
                }

            } else {
                $product['quantity'] = 1;
                $cart->push($product);
            }
            Session::flash('message', 'Đã thêm sản phẩm vào giỏ hàng');
            Session::put('cart', $cart);
            return redirect()->back();
        } catch (\Exception $e) {
            report($e);
            abort(500);
        }
    }
    public function update()
    {

    }

    public function destroy()
    {

    }
}
