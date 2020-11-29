@extends('layouts.frontend.master')

@section('page_title', $category->meta_title ?? env('APP_NAME'))
@section('meta_desc', $category->meta_desc ?? $category->name)
@section('meta_keyword', $category->meta_keyword ?? $category->name)

@section('main_content')
    <div class="subDetail">
        <div class="container">
            <a href="/" title="Trang chủ">Trang chủ</a> /
            <a href="">{{ $category->name }}</a>
        </div>
    </div>
	@include('frontend.products._list', [
    'categoryName' => $category->name ?? null,
    'productPaginate'     => $productPaginate
    ])

@endsection
