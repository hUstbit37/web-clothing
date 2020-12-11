@extends('layouts.frontend.master')

@section('main_content')

    <list-product>
        <div style="border-top: 1px solid #4b4848; opacity: 0.4"></div>
        <div class="container">
            <div class="titlePrimary">
                Tìm kiếm
                <p>Có {{ $productSearchCount }} sản phẩm cho tìm kiếm</p>
{{--                <p style="background: #111111; width: 60px; height: 4px;">a</p>--}}
            </div>

            <div>Kết quả tìm kiếm cho <i>"{{app('request')->input('keyword')}}"</i></div>
            <x-search></x-search>
            <div class="__product">
                @foreach($productSearchs as $productSearch )
                    <div class="item wow slideInRight" data-wow-duration="1s" data-wow-delay="1s" >
                        <div class="image">
                            <a href="{{ url($productSearch->slug).'/product' }}"><img src="{{ url('images/product-cover.jpg') }}" alt=""></a>
                            <div class="function">
                                <a href=""><i class="fas fa-heart"></i></a>
                                <a href="{{ url($productSearch->slug).'/product' }}"><i class="fas fa-eye"></i></a>
                                <a href=""><i class="fas fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <h1>{{ $productSearch->name }}</h1>
                        <h2>
                            @if($productSearch->discount)
                                <s>{{ number_format($productSearch->discount, 0) }}%</s>
                            @endif
                            <span>{{ number_format($productSearch->price, 0) }} vnđ</span>
                        </h2>
                    </div>
                @endforeach
            </div>
        {{$productSearchs->withQueryString() ->links()}}
        </div>
    </list-product>

@endsection
