<?php


namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new Product;
    }

    public function save(array $input, $id = null)
    {
        return $this->productModel->updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name' => $input['name'],
                'slug' => $input['slug'],
                'price' => $input['price'],
                'discount' => $input['discount'] ?? 0,
                'image' => $input['image'],
                'meta_title' => $input['meta_title'],
                'meta_desc' => $input['meta_desc'],
                'meta_keyword' => $input['meta_keyword'],
            ]
        );
    }

    public function getAll($limit = 8)
    {
        return $this->productModel->paginate($limit);
    }

    public function destroy(array $ids)
    {
        foreach ($ids as $id) {
            Product::find($id)->categories()->detach();
        }
        $result = $this->productModel->destroy($ids);
        return $result;
    }

}
