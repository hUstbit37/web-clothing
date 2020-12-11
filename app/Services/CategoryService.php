<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    const PRODUCT_PER_PAGE = 8;

    public function getAll()
    {
        return Category::all();
    }

    public function menus($limit = 5)
    {
        return Category::where(['is_home' => false])
            ->take($limit)->get();
    }

    public function findBySlug($slug)
    {
        return Category::where(['slug' => $slug])->first();
    }

    public function getProducts(Category $category)
    {
        return $category->products()->paginate(self::PRODUCT_PER_PAGE);
    }

    public function getCategoryChoice()
    {
        return Category::where(['is_home' => true])->take(3)->get();
    }
}
