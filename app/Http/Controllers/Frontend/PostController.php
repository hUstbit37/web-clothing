<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    public $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function show($slug)
    {
        return view('frontend.posts.show', [
            'post' => $this->postService->findBySlug($slug)
        ]);
    }
}
