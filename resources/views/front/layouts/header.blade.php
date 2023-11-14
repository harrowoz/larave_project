<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="./wishlist"><span class="icon_heart_alt"></span>
            <div class="tip">2</div>
        </a></li>
        <li><a href="./cart"><span class="icon_bag_alt"></span>
            <div class="tip">2</div>
        </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="./"><img src="{{asset('front-assets/img/logo.png')}}" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
    @if(Auth::check())
        <a href="./">{{Auth::user()->name}}</a>
        <a href="./">Logout</a>
    @else
        <a href="./login">Login</a>
        <a href="./register">Register</a>
    @endif
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="./"><img src="{{asset('front-assets/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="./">Home</a></li>
                        <li><a href="{{ route("front.shop",'man')}}">man</a></li>
                        <li><a href="{{ route("front.shop",'women')}}">women</a></li>
                        <li><a href="{{ route("front.shop")}}">Shop</a></li>
                        <li><a href="./contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        @if(Auth::check())
                        <a href="./">{{Auth::user()->name}}</a>
                        <a href="{{route('logout')}}">Logout</a>
                    @else
                        <a href="./login">Login</a>
                        <a href="./register">Register</a>
                    @endif
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="./wishlist"><span class="icon_heart_alt"></span>
                            <div class="tip">2</div>
                        </a></li>
                        <li><a href="./cart"><span class="icon_bag_alt"></span>
                            <div class="tip">2</div>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>