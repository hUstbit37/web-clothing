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
                'image' => $input['image'] ?? 'imageProduct.jpg',
                'meta_title' => $input['meta_title'],
                'meta_desc' => $input['meta_desc'],
                'meta_keyword' => $input['meta_keyword'],
            ]
        );
    }

    public function findById($id)
    {
        return $this->productModel->find($id);
    }
    public function paginate($limit = 10)
    {
        return $this->productModel->orderBy('id')->with('categories')->paginate($limit);
    }
    public function getAll()
    {
        return $this->productModel->get();
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
