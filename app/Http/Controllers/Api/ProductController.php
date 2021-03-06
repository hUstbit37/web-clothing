<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Exception;

use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

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
            $products = $this->productRepository->paginate();
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $products
            ]);
        } catch (Exception $e){
            return reportErrorsMessage($e);
        }
    }

    public function show($id)
    {
        try {
            $product = $this->productRepository->findById($id);
            $product['category_ids'] = $product->categories()->pluck('category_id')->toArray();
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $product,
            ]);
        } catch (Exception $e) {
            return reportErrorsMessage($e);
        }
    }

    public function store(Request $request)
    {
        try {
            if ($request ->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $item) {
                    $imageName = $item->getClientOriginalName() ;
                    $destinationPath = public_path().'/images/upload' ;
                    $item->move($destinationPath,$imageName);
                }
            }

            $input = $request->only(['name', 'slug', 'price', 'discount', 'image', 'meta_title', 'meta_desc', 'meta_keyword']);
            $product = $this->productService->saveProduct($input, $request->category_ids);
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $product,
                'category_ids' => $request->category_ids,
            ]);
        } catch (Exception $e){
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
                'code' => 200,
                'data' => $product,
                'category_ids' => $request->category_ids,
            ]);
        } catch (Exception $e){
            return reportErrorsMessage($e);
        }
    }

    public function destroy($id)
    {
        try {
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $this->productRepository->destroy([$id]),
            ]);
        } catch (Exception $e){
            return reportErrorsMessage($e);
        }
    }
}
