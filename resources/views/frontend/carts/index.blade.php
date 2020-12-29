@extends('layouts.frontend.master')

@section('main_content')
    <div class="subDetail">
        <div class="container">
            <a href="/" title="Trang chủ">Trang chủ</a> /
            <a href="{{ route('cart.index') }}">Giỏ hàng</a>
        </div>
    </div>
    <div class="titlePrimary">
        Giỏ hàng của bạn
        <p>Có {{ countCart('cart') }} sản phẩm trong giỏ hàng</p>
        <div class="titlePrimary-line"></div>
    </div>
    <div class="container">
        <div class="cart-content">
            <form action="{{ route('cart.update') }}" method="post">
                @csrf
                @method('put')
                <div class="cart-product">
                    @php
                        $total = 0;
                    @endphp
                    @foreach($products as $product)
                        @php
                            $total += $product->price * $product->quantity;
                        @endphp
                        <div class="cart-item">
                            <div class="cart-image">
                                <img src="{{ url('images/1.jpg') }}" alt="">
                            </div>
                            <div class="cart-detail">
                                <span>{{ $product->name }}</span>
                                <span>{{ number_format($product->price) }}₫</span>
                                <span>Size/ Color</span>
                                <div class="quantity" id="{{$product->id}}">
                                    <button class="btn minus1" type="button">-</button>
                                    <input id="quantity-{{$product->id}}" name="quantity[{{$product->id}}]"
                                           value="{{ $product->quantity }}"
                                           type="number">
                                    <button class="btn add1" type="button">+</button>
                                </div>
                            </div>
                            <div class="cart-item-control">
                                <a href="{{ route('cart.delete', ['id'=>$product->id]) }}">
                                    <i class="fas fa-times"></i>
                                </a>
                                <div class="cart-money">{{ number_format($product->price * $product->quantity) }}₫</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            <div class="cart-total-money">
                @if($total)
                <a href="{{ route('cart.update') }}">
                    <button class="button-hover" type="submit" style="width: 100px; font-size: 17px; background: #e85205; ">Cập nhật
                    </button>
                </a>
                @endif
                    Tổng tiền:
                <strong>{{ number_format($total) }}₫</strong>
            </div>
            </form>
            <div class="cart-control">
                <a href="/">
                    <button class="button-hover">
                        <i class="fas fa-reply"></i>
                        Tiếp tục mua hàng
                    </button>
                </a>
                <a href="">
                    <button class="button-hover">Thanh toán</button>
                </a>
            </div>

        </div>
    </div>
    {{--    </div>--}}
    {{--    <div style="clear: both"></div>--}}
@endsection
