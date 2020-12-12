<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

use App\Repositories\ProductRepository;
use App\Services\ProductService;
class ProductController extends Controller
{
    protected $productRepository;
    protected $productService;
    public function __construct(
        ProductRepository $productRepository,
        ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    public function index()
    {
        try {
            $products = $this->productRepository->getAll();
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $products
            ]);
        } catch (\Exception $e){
            return reportErrorsMessage($e);
        }
    }

    public function show($id)
    {
        try {
            $product = $this->productRepository->findById($id);
            $category_id = $product->categories()->get();
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $product,
                'category_id' => $category_id
            ]);
        } catch (\Exception $e) {
            return reportErrorsMessage($e);
        }
    }

    public function store(ProductRequest $request)
    {
        try {
            $input = $request->only(['name', 'slug', 'price', 'discount', 'image', 'meta_title', 'meta_desc', 'meta_keyword']);
            $product = $this->productService->saveProduct($input, $request->category_ids);
            return response()->json([
                'status' => true,
                'code' => '',
                'data' => $product,
                'category_ids' => $request->category_ids,
            ]);
        } catch (\Exception $e){
            return reportErrorsMessage($e);
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $input = $request->only(['name', 'slug', 'price', 'discount', 'image', 'meta_title', 'meta_desc', 'meta_keyword']);
            $product = $this->productService->saveProduct($input, $request->category_ids, $id);
            return response()->json([
                'status' => true,
                'code' => '',
                'data' => $product,
                'category_ids' => $request->category_ids,
            ]);
        } catch (\Exception $e){
            return reportErrorsMessage($e);
        }
    }

    public function destroy($id)
    {
        try {
            return response()->json([
                'status' => true,
                'code' => '',
                'data' => $this->productRepository->destroy([$id]),
            ]);
        } catch (\Exception $e){
            return reportErrorsMessage($e);
        }
    }
}
