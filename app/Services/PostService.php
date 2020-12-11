<?php
namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getPostChoice()
    {
        return Post::where(['is_home' => true])->take(4)->get();
    }
    public function findBySlug($slug)
    {
        return Post::where(['slug' =>$slug])->first();
    }
}
