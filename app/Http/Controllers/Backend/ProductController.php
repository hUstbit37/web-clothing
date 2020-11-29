<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return 'Danh sách sản phẩm';
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function update()
    {
        return redirect(route('backend.product.index'));
    }

    public function show($id)
    {
        return 'Product ID: ' . $id;
    }

    public function destroy()
    {
        dd(__METHOD__);
    }
}
