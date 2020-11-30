@extends('layouts.frontend.master')

@section('page_title', $product->meta_title ?? $product->name)
@section('page_desc', $product->meta_desc ?? $product->name)
@section('meta_keyword', $product->meta_keyword ?? $product->name)

@section('main_content')
    <div class="subDetail">
        <div class="container">
            <a href="/" title="Trang chủ">Trang chủ</a> /
            <a href="">{{ $product->name }}</a>
        </div>
    </div>

    <div class="detailProduct">
        <div class="container">
            <div class="item">
                <div class="gallery">
                    <div class="previews">
                        <a href="#" class="selected" data-full="images/top1large.jpg">
                            <img src="{{ url('images/1.jpg') }}" alt=""/>
                        </a>
                        <a href="#" data-full="{{ url('images/2.jpg') }}">
                            <img src="{{ url('images/2.jpg') }}" alt=""/>
                        </a>
                        <a href="#" data-full="{{ url('images/3.jpg') }}">
                            <img src="{{ url('images/3.jpg') }}" alt=""/>
                        </a>
                        <a href="#" data-full="{{ url('images/4.jpg') }}">
                            <img src="{{ url('images/4.jpg') }}" alt=""/>
                        </a>
                        <a href="#" data-full="{{ url('images/5.jpg') }}">
                            <img src="{{ url('images/5.jpg') }}" alt=""/>
                        </a>
                        <a href="#" data-full="{{ url('images/6.jpg') }}">
                            <img src="{{ url('images/6.jpg') }}" alt=""/>
                        </a>
                        <a href="#" data-full="{{ url('images/7.jpg') }}">
                            <img src="{{ url('images/7.jpg') }}" alt=""/>
                        </a>
                    </div>
                    <div class="full"><img src="{{ url('images/1full.jpg') }}" alt=""/></div>
                </div>
                <div class="detail">
                    <span>{{ $product->name }}</span>
                    <span>SKU:{{ $product->sku }}KG0S1293BcS</span>
                    <span>{{ number_format($product->price, 0) }} đ</span>
                    <div class="size">
                        <div class="size-type">
                            <input type="radio" id="size-s">
                            <label for="size-s">S</label>
                        </div>
                        <div class="size-type">
                            <input type="radio" id="size-m">
                            <label for="size-m">M</label>
                        </div>
                        <div class="size-type">
                            <input type="radio" id="size-l">
                            <label for="size-l">L</label>
                        </div>
                        <div class="size-type">
                            <input type="radio" id="size-xl">
                            <label for="size-xl">XL</label>
                        </div>
                        <div class="size-type">
                            <input type="radio" id="size-xxl">
                            <label for="size-xxl">XXL</label>
                        </div>
                    </div>
                    <div class="quantity">
                        <button class="btn minus1">-</button>
                        <input class="quantity" id="id_form-0-quantity"  name="form-0-quantity" value="1" type="number">
                        <button class="btn add1">+</button>
                    </div>
                    <a href="{{ route('cart.store', ['id' => $product->id]) }}">
                        <button id="add-order">Thêm vào giỏ hàng</button>
                    </a>
                    @if(Session::has('message'))
                    <div class="alert alert-success" style="background: #c8e2d6; padding: 5px; height: 40px; width: 60%; line-height: 30px;">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both"></div>

    <div class="container">
        <div class="moreProduct">
            Sản phẩm liên quan
        </div>
    </div>

    <list-product>
        <div class="container">
            <div class="__product">
                @foreach($products as $product)
                    <div class="item">
                        <div class="image">
                            <a href="{{ url($product->slug).'/product' }}">
                                <img src="{{ url('images/product-cover.jpg') }}" alt="{{ $product->name }}">
                            </a>
                            <div class="function">
                                <a href=""><i class="fas fa-heart"></i></a>
                                <a href="{{ url($product->slug).'/product' }}"><i class="fas fa-eye"></i></a>
                                <a href=""><i class="fas fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <h1>{{ $product->name }}</h1>
                        <h2>
                            @if($product->discount)
                                <s>{{ number_format($product->discount, 0) }}</s>
                            @endif
                            <span>{{ number_format($product->price, 0) }} vnd</span>
                        </h2>
                    </div>
                @endforeach
            </div>
        </div>
    </list-product>
    <script>
        $(document).ready(function () {
            $('.minus1').on('click', function () {
                let currentVal = parseInt($('#id_form-0-quantity').val());
                console.log(currentVal);
                if (!isNaN(currentVal) && currentVal > 0){
                    $('#id_form-0-quantity').val(currentVal - 1);
                }
            })
            $('.add1').on('click',function () {
                let currentVal = parseInt($('#id_form-0-quantity').val());
                console.log(currentVal);
                if (!isNaN(currentVal)){
                    $('#id_form-0-quantity').val(currentVal + 1);
                }
            })
        })
    </script>
@endsection

