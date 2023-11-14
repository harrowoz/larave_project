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

   

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            @if(Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!!Session::get('success')!!} 
                    </div>
                </div>
            @endif

            @if(Session::has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {!!Session::get('error')!!} 
                    </div>
                </div>
            @endif   
            <div class="row">
                @if(Cart::count()>0)
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartContent as $item)
                                <tr>
                                    <td class="cart__product__item text-start">
                                    @if(!empty($item->options->image))
                                        <img src="{{asset('front-assets/img/shop-cart/cp-1.jpg')}}" alt="">
                                        @else
                                        <img src="{{asset('front-assets/img/shop-cart/cp-1.jpg')}}" alt="">
                                        @endif
                                        <div class="cart__product__item__title">
                                            <h6>{{$item->name}}</h6>
                                        </div>
                                    </td>
                                    <td class="cart__price">${{$item->price}}</td>
                                    <td class="cart__quantity">
                                    <div style="align-items: center;display: flex;width:50%">
                                    <div>
                                        <button data-id="{{$item->rowId}}" class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm border-0 text-center" value="{{$item->qty}}">
                                    <div>
                                      <button data-id="{{$item->rowId}}" class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 add">
                                        <i class="fa fa-plus"></i>
                                        </button>  
                                    </div>
                                </div>

                                    </td>
                                    <td class="cart__total">${{$item->price*$item->qty}}</td>
                                    <td class="cart__close"><button class="btn btn-sm btn-danger" onclick="deleteItem('{{$item->rowId}}');"><i class="fa fa-times"></i></button></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{ route("front.shop")}}">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="{{ route("front.cart")}}"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                   
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>${{Cart::subtotal()}}</span></li>
                            <li>Total <span>$ {{Cart::subtotal()}}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h4>Your Cart is empty!</h4>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

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
<script>
     $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('.add').click(function(){
      var qtyElement = $(this).parent().prev(); // Qty Input
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue < 10) {
        qtyElement.val(qtyValue+1);
        var rowId = $(this).data('id');
        var newQty = qtyElement.val(); 
        updateCart(rowId,newQty)
      }            
  });

  $('.sub').click(function(){
      var qtyElement = $(this).parent().next(); 
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue > 1) {
          qtyElement.val(qtyValue-1);
          var rowId=$(this).data('id');
          var newQty=qtyElement.val(); 
          updateCart(rowId,newQty)
      }        
  });

  function updateCart(rowId,qty){
    $.ajax({
        url:'{{route("front.updateCart")}}',
        type:'post',
        data:{rowId:rowId,qty:qty},
        datatype:'json',
        success:function(response){
        }
    });
  }

  function deleteItem(rowId){
    if(confirm("Are you sure you want to delete?")){
    $.ajax({
            url:'{{route("front.deleteItem.cart")}}',
            type:'post',
            data:{rowId:rowId},
            datatype:'json',
            success:function(response){
                if(response.status==true){
                    window.location.href='{{route("front.cart")}}';
                }
            }
        });
    }
  }
</script>
</html>