<div id="header-full">
    <line-header class="wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="left">⚡ HAPPY HOLIDAY DEALS ON EVERYTHING ⚡</div>
                <div class="right">
                    <a href="">Shipping</a>
                    <a href="">FAQ</a>
                    <a href="">Contact</a>
                    <div class="social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-google-plus-g"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </line-header>

    <header class="wow slideInRight">
        <div class="container">
            <div class="row rowAlign">
                <div class="menu-bar" onclick="">
                    <i class="fas fa-bars" id="icon-bar"></i>
                </div>
                <div class="logo">
                    <a href="/" title="Trang chủ"><img src="{{ url('/images/logo.png') }}" alt=""></a>
                </div>
                <div class="menu" id="menu">
                    <x-menu></x-menu>
                </div>
                <div class="subFunctional">
                    <i id="searchShow" class="fas fa-search" style="cursor: pointer"></i>
                    <a href=""><i class="fas fa-user"></i></a>
                    <a href=""><i class="fas fa-heart"></i></a>
                    <a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart">
                            <span class="count-cart">{{ countCart('cart') }}</span>
                        </i>

                    </a>
                </div>
            </div>
            <form id="form_search" action="{{ url('search') }}" method="get" style="text-align: center; display: none;">
                <input type="text" name="keyword" id="" placeholder="Tìm kiếm sản phẩm">
                <button type="submit"><i class="fa fa-search "></i></button>
            </form>
        </div>
    </header>
</div>


<script>

    // function myFunction() {
    //
    //     let x = document.getElementById("menu");
    //     let y = document.getElementById("icon-bar");
    //     if (x.style.display === "block") {
    //         y.classList.add('fa-bars');
    //         y.classList.remove('fa-times');
    //         x.style.display = "none";
    //     } else {
    //         y.classList.remove('fa-bars');
    //         y.classList.add('fa-times');
    //         x.style.display = "block";
    //     }
    // }
</script>
