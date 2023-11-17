
@extends('front.layouts.master')
@section('main-content')
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
                                <img style="height: 546px;width: 410px;" class="product__big__img {{ ($key==0)? 'active':''}}" src="{{asset('front-assets/img/product/'.$productImage->image)}}" alt="">
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

                        <p>{{$product->description}}</p>

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
                            <li><a href="javascript:void(0);" onclick="addToWishlist({{ $product->id }});"><span class="icon_heart_alt"></span></a></li>
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
                            <div style="height: 360px;width: 270px;" class="product__item__pic set-bg" data-setbg="{{asset('front-assets/img/product/'.$productImage->image)}}">
                            @endif
                            @if($rproduct->qty==0)
                            <div class="label stockout">out of stock</div>
                            @endif
                            <ul class="product__hover">
                            <li><a href="javascript:void(0);" onclick="addToWishlist({{ $rproduct->id }});"><span class="icon_heart_alt"></span></a></li>

                                <li><a href="javascript:void(0);" onclick="addToCart({{$rproduct->id}});"><span class="icon_bag_alt"></span></a></li>

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

    @endsection
    @section('customJs')
    @endsection
    

