
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('front-assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front-assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front-assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front-assets/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front-assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front-assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front-assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front-assets/css/ion.rangeSlider.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front-assets/css/style.css')}}" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
   <!-- Page Preloder -->
   <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="{{route("front.wishlist")}}"><span class="icon_heart_alt"></span>
                            </a></li>
                            <li><a href="{{route("front.cart")}}"><span class="icon_bag_alt"></span>
                            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="{{ route("front.home")}}"><img src="{{asset('front-assets/img/logo.png')}}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
        <a href="{{route("front.login")}}">Login</a>
                            <a href="{{route("front.register")}}">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route("front.home")}}"><img src="{{asset('front-assets/img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                        <li class="active"><a href="{{ route("front.home")}}">Home</a></li>
                            <li><a href="{{ route("front.shop",'man')}}">man</a></li>
                            <li><a href="{{ route("front.shop",'women')}}">women</a></li>
                            <li><a href="{{ route("front.shop")}}">Shop</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                        @if(Auth::check())
                            <a href="./">{{Auth::user()->name}}</a>
                            <a href="{{route("front.login")}}">Logout</a>
                        @else
                            <a href="{{route("front.login")}}">Login</a>
                            <a href="{{route("front.register")}}">Register</a>
                        @endif
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="{{route("front.wishlist")}}"><span class="icon_heart_alt"></span>
                            </a></li>
                            <li><a href="{{route("front.cart")}}"><span class="icon_bag_alt"></span>
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
    <!-- Header Section End -->
    
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__slider__content">
                           
                            <div class="product__details__pic__slider owl-carousel ">
                            @if($product->product_images)
                            @foreach($product->product_images as $key =>$productImages)
                                <img data-hash="product-1" class="product__big__img {{ ($key==0)? 'active':''}}" src="{{asset('front-assets/img/product/details/product-1.jpg')}}" alt="">
                                @endforeach
                            @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$product->title}}</h3>
                        <div class="product__details__price">$ {{$product->price}}
                                    @if($product->compare_price > 0)
                                    <span>$ {{$product->compare_price}}</span>
                                    @endif</div>
                        <p>Nemo enim ipsam voluptatem quia aspernatur aut odit aut loret fugit, sed quia consequuntur
                        magni lores eos qui ratione voluptatem sequi nesciunt.</p>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity: {{$product->qty}}</span>
                            </div>
                            @if($product->qty==0)
                            <a href="#"  class="cart-btn" aria-disabled="true"><span class="icon_bag_alt"></span> Out of stock</a>
                            @else
                            <a href="javascript:void(0);" onclick="addToCart({{$product->id}});" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                            @endif
                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs" role="tab">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs" role="tabpanel">
                                <p>{!! $product->description!!}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                            @foreach($rproducts as $rproduct)
                            @php
                                $productImage = $rproduct ->product_images;
                            @endphp
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                    @if(!empty($productImage->image))
                            <div class="product__item__pic set-bg" data-setbg="{{asset('front-assets/img/shop/shop-2.jpg')}}">
                            @else
                            <div class="product__item__pic set-bg" data-setbg="{{asset('front-assets/img/shop/shop-2.jpg')}}">
                            @endif
                            <ul class="product__hover">
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{route("front.product",$rproduct->slug)}}">{{$rproduct->title}}</a></h6>
                            <div class="product__price">$ {{$rproduct->price}}
                                    @if($rproduct->compare_price > 0)
                                    <span>$ {{$rproduct->compare_price}}</span>
                                    @endif</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('front-assets/img/instagram/insta-1.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('front-assets/img/instagram/insta-2.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('front-assets/img/instagram/insta-3.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('front-assets/img/instagram/insta-4.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('front-assets/img/instagram/insta-5.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('front-assets/img/instagram/insta-6.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="./index.html"><img src="{{asset('front-assets/img/logo.png')}}" alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        cilisis.</p>
                        <div class="footer__payment">
                            <a href="#"><img src="{{asset('front-assets/img/payment/payment-1.png')}}" alt=""></a>
                            <a href="#"><img src="{{asset('front-assets/img/payment/payment-2.png')}}" alt=""></a>
                            <a href="#"><img src="{{asset('front-assets/img/payment/payment-3.png')}}" alt=""></a>
                            <a href="#"><img src="{{asset('front-assets/img/payment/payment-4.png')}}" alt=""></a>
                            <a href="#"><img src="{{asset('front-assets/img/payment/payment-5.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>Quick links</h6>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Orders Tracking</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>NEWSLETTER</h6>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{asset('front-assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front-assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front-assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('front-assets/js/mixitup.min.js')}}"></script>
    <script src="{{asset('front-assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('front-assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('front-assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front-assets/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('front-assets/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('front-assets/js/main.js')}}"></script>
</body>
<script type="text/javascript">
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    function addToCart(id){
        $.ajax({
            url:'{{route("front.addToCart")}}',
            type:'post',
            data:{id:id},
            dataType:'json',
            success:function(response){
                if(response.status==true){
                    window.location.href= "{{route('front.cart')}}";
                }else{
                    alert(response.message);
                }
            }
        });
    }
</script>
</html>