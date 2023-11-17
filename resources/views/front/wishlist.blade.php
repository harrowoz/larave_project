
@extends('front.layouts.master')
@section('main-content')
   
    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                @if($wishlists->isNotEmpty())
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>My Products</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <div class="col-md-12">
                            @include('front.layouts.message')
                        </div>
                            <tbody>
                                
                                    @foreach($wishlists as $wishlist )
                                    <tr>
                                        <td class="cart__product__item">
                                          <a href="">  <img style="height: 90px;width: 90px;" src="{{asset('front-assets/img/product/'.$wishlist->product->image)}}" alt="">
                                            <div class="cart__product__item__title">
                                                <h6>{{$wishlist->product->title}}</h6>
                                            </div>
                                        </a>
                                        </td>
                                        <td class="cart__price">${{$wishlist->product->price}} <del class="text-muted">${{$wishlist->product->compare_price}}</del></td>
                                            <td class="cart__close">
                                                <button class="btn btn-sm btn-danger" removeProduct({{$wishlist->product_id}})"><i class="fa fa-times"></i></button>
                                                <a href="javascript:void(0);" onclick="addToCart({{$wishlist->product_id}});"><button class="btn btn-sm btn-danger"><i class="fa fa-shopping-cart"></i></button></a>
                                            </td>
                                    </tr>
                                    @endforeach
                                    @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h4>Your List is empty!</h4>
                        </div>
                    </div>
                </div>
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
