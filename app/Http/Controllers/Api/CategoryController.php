<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $categoriesAll = $this->categoryRepository->getAll();
            $categories = $this->categoryRepository->paginate();
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $categories,
                'dataAll' => $categoriesAll
            ]);
        } catch (\Exception $e) {
            return reportErrorsMessage($e);
        }
    }

    public function show($id)
    {
        try {
            return $this->categoryRepository->findById($id);
        } catch (\Exception $e) {
            return reportErrorsMessage($e);
        }
    }

    public function store(CategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $input = $request->only(['name', 'slug', 'parent_id', 'is_home', 'meta_title', 'meta_desc', 'meta_keyword']);
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $this->categoryRepository->save($input)
            ]);
        } catch (\Exception $e) {
            return reportErrorsMessage($e);
        }
    }

    public function update(CategoryRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $input = $request->only(['name', 'slug', 'parent_id', 'is_home', 'meta_title', 'meta_desc', 'meta_keyword']);
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $this->categoryRepository->save($input, $id)
            ]);
        } catch (\Exception $e) {
            return reportErrorsMessage($e);
        }
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        try {
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $this->categoryRepository->destroy([$id])
            ]);
        } catch (\Exception $e) {
            return reportErrorsMessage($e);
        }
    }

}
