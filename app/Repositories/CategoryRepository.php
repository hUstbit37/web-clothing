<?php

namespace App\Repositories;

use App\Models\Category;
class CategoryRepository
{
    public function save(array $input, $id = null)
    {
        return Category::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $input['name'],
                'slug' => $input['slug'],
                'parent_id' => $input['parent_id'] ?? 0 ,
                'is_home' => $input['is_home'] ?? false ,
                'meta_title' => $input['meta_title'],
                'meta_desc' => $input['meta_desc'],
                'meta_keyword' => $input['meta_keyword'],
            ]
        );
    }

    public function findById($id)
    {
        return Category::find($id);
    }

    public function getAll()
    {
        return Category::all();
    }
    public function paginate($limit = 6)
    {
        return Category::with('products')->paginate($limit);
    }

    public function destroy(array $ids)
    {
        return Category::destroy($ids);
    }
}
