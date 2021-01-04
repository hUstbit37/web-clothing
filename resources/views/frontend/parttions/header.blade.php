<div id="header-full">
    <line-header>
        <div class="container">
            <div class="row">
                <div class="left">⚡Fasshion and so much more⚡</div>
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

    <header>
        <div class="container">
            <div class="row rowAlign">

                <div class="logo">
                    <span class="menu-bar">
                        <i class="fas fa-bars " id="icon-bar"></i>
                    </span>
                    <a href="/" title="Trang chủ"><img src="{{ url('/images/logo.png') }}" alt=""></a>
                </div>
                <div class="menu" id="menu">
                    <x-menu></x-menu>
                </div>

                <div class="subFunctional">
                    <div><span><i id="searchShow" class="fas fa-search"></i></span></div>
                    <div class="user-dropdown">
                        <span><i class="fas fa-user user-icon"></i></span>
                        <div class="user-dropdown-menu">
                            <div class="user-box-triangle"></div>
                            @auth
                                <a class="user-dropdown-item" href="#">Hello {{Auth::user()->name}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none">
                                    @csrf
                                </form>
                            @else
                                <a class="user-dropdown-item" href="{{ route('login')  }}">Đăng nhập</a>
                                <a class="user-dropdown-item" href="{{ route('register')  }}">Đăng ký</a>
                            @endauth
                        </div>
                    </div>
                    <div>
                        <span><i class="fas fa-heart"></i></span>
                    </div>
                    <div> <span><a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart">
                            <span class="count-cart">{{ countCart('cart') }}</span>
                        </i>
                    </a></span></div>

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

</script>
