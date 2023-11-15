
@extends('front.layouts.master')
@section('main-content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>My Wishlist</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <div class="col-md-12">
                            @include('front.layouts.message')
                        </div>
                            <tbody>
                                @if($wishlists->isNotEmpty())
                                    @foreach($wishlists as $wishlist )
                                    <tr>
                                        <td class="cart__product__item">
                                          <a href="{{route("front.shop")}}">  <img  src="{{asset('front-assets/img/shop-cart/cp-2.jpg')}}" alt="">
                                            <div class="cart__product__item__title">
                                                <h6>{{$wishlist->product->title}}</h6>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </a>
                                        </td>
                                        <td class="cart__price">{{$wishlist->product->price}} <del>{{$wishlist->product->compare_price}}</del></td>
                                        <td class="cart__close">
                                            <button class="icon_close" onclick="removeProduct({{$wishlist->product_id}})"></button></td>
                                    </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>

    @endsection
@section('customJs')
    <script>
        function removeProduct(id){
            $.ajax({
            url:'{{route("front.removeProductFromWishlist")}}',
            type:'post',
            data:{id:id},
            dataType:'json',
            success:function(response){
                if (response.status ==true){
                    window.location.href="{{route('front.wishlist')}}"
                }
            }
        });
        }
    </script>
@endsection
