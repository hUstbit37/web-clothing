<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;

class ProductService
{
    const PRODUCT_PER_PAGE = 8;

    public function findBySlug($slug)
    {
        return Product::where(['slug' => $slug])->first();
    }
    public function getByCategoryId(array $categoryIds, int $productId = null)
    {
//        $query1 = Category::join('category_product', function ($query) {
//            $query->on('category_product.category_id', 'categories.id');
//        });
//            dd($query1->where('categories.id', 9)->get()->toArray());
        $query = Product::join('category_product', function ($query) use($categoryIds) {
            $query->on('category_product.product_id', 'products.id')
                ->whereIn('category_id', $categoryIds);
        });
        if ($productId){
            $query->where('products.id', '!=', $productId);
        }
        return $query->take(self::PRODUCT_PER_PAGE)->get();
    }
    public function getNewProducts()
    {
        return Product::orderBy('id', 'desc')->take(self::PRODUCT_PER_PAGE)->get();
    }
    public function search($input)
    {
        $query = Product::query();
        if (!empty($input)) {
            $query->where('name', 'like', "%" .$input. "%");
        }
        return $query;
    }
}
