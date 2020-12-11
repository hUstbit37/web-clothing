<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;

class SearchController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index(Request $request)
    {
        $keywordSearch = $request->input('keyword');
        $productSearchCount = count($this->productService->search($keywordSearch)->get());
        $productSearchs = $this->productService->search($keywordSearch)->paginate(8);

        return view('frontend.search.index',[
            'productSearchs' => $productSearchs,
            'keywordSearch' => $keywordSearch,
            'productSearchCount' => $productSearchCount
        ]);
    }
}
