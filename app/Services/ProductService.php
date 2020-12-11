<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Repositories\ProductRepository;

class ProductService
{
    const PRODUCT_PER_PAGE = 8;

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function saveProduct(array $input, array $category_ids, int $id = null)
    {
        try {
            DB::beginTransaction();
            $product = $this->productRepository->save($input,$id);
            if($id){
                $product->categories()->sync($category_ids);
            } else {
                $product->categories()->attach($category_ids);

            }
            DB::commit();
            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            return reportErrorsMessage($e);
        }
    }
    public function findById($id)
    {
        return Product::find($id);
    }
    public function findBySlug($slug)
    {
        return Product::where(['slug' => $slug])->first();
    }
    public function getByCategoryId(array $categoryIds, int $productId = null)
    {
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
