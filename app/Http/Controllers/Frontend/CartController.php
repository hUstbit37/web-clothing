<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Exception;
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

        $products = Session::get('cart') ?? collect();
        return view('frontend.carts.index', [
            'products' => $products
        ]);
    }

    public function store($id)
    {
        try {
            $product = $this->productService->findById($id);
            $cart = Session::get('cart') ?? collect();
            $productInCart = $cart->where('id', $id)->first();
            if (($cart->count()) === 0 || $productInCart === null) {
                $product['quantity'] = 1;
                $cart->push($product);
            } else {
                $productInCart['quantity'] += 1;
            }
            Session::put('cart', $cart);
            Session::flash('message', 'Đã thêm sản phẩm vào giỏ hàng');
            return redirect()->back();
        } catch (Exception $e) {
            report($e);
            abort(500);
        }
    }
    public function update(Request $request)
    {
        $cart = Session::get('cart') ?? collect();
        foreach ($request->quantity as $productId => $quantity){
            $productInCart = $cart->where('id', $productId)->first();
            $productInCart['quantity']= $quantity;
        }
        return redirect(route('cart.index'));
    }

    public function destroy($id)
    {
        $cart = Session::get('cart') ?? collect();
       $products = $cart->reject(function ($product) use($id){
            return $product->id == $id;
        });
       Session::put('cart', $products);
       return redirect(route('cart.index'));
    }
}
