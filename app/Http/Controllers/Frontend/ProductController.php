<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show($slug)
    {
        $product = $this->productService->findBySlug($slug);
        $categoryIds = $product->categories->pluck('id')->toArray();
        $products = $this->productService->getByCategoryId($categoryIds, $product->id);
//        dd($products);
        return view('frontend.products.show', [
            'product' => $product,
            'products' => $products,
        ]);
    }
}
