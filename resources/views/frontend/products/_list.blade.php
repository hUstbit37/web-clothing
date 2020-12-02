<list-product>
    <div class="container">
        <div class="titlePrimary">
            {{ $categoryName ?? 'Top New Products' }}
        </div>
        @php
        // Vì _list.blade.php dùng chung giữa home.index với categorie.index, lúc đầu khi mới vào trang home, biến
        //    $productPaginate sẽ k nhận đc, ta sẽ thay bằng $products - những sp mới lấy từ homecontroller
            $products = !empty($productPaginate) ? $productPaginate : $products;
        @endphp

            <div class="__product">
                @foreach($products as $product )
                <div class="item">
                    <div class="image">
                        <a href="{{ url($product->slug).'/product' }}"><img src="{{ url('images/img-1.jpg') }}" alt=""></a>
                        <div class="function">
                            <a href=""><i class="fas fa-heart"></i></a>
                            <a href="{{ url($product->slug).'/product' }}"><i class="fas fa-eye"></i></a>
                            <a href=""><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <h1>{{ $product->name }}</h1>
                    <h2>
                        @if($product->discount)
                            <span>{{ number_format(round(($product->price) - ($product->discount)*($product->price)*0.01, -3)) }}₫</span>
                            <s>{{ number_format($product->price, 0) }}₫</s>
                        @else
                            <span>{{ number_format($product->price, 0) }}₫</span>
                        @endif
                    </h2>
                </div>
                @endforeach
            </div>
        @if(!empty($productPaginate))
            {{ $productPaginate->links() }}
        @endif
    </div>
</list-product>
