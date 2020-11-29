@extends('layouts.frontend.master')

@section('main_content')
    <x-category-choice></x-category-choice>
    <x-shipping :price="150"></x-shipping>
    <x-post-choice></x-post-choice>
    @include('frontend.products._list', [
    'products' => $products
    ])
@endsection
