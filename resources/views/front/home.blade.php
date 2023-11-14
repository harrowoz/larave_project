
@extends('front.layouts.master')
@section('main-content')
<!-- Categories Section Begin -->
<section class="categories">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="{{asset('front-assets/img/categories/category-1.jpg')}}">
                    <div class="categories__text">
                        <h1>Women’s fashion</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                        edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="./shop">Shop now</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="{{asset('front-assets/img/categories/category-2.jpg')}}">
                    <div class="categories__text">
                        <h1>Men’s fashion</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                        edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="./shop">Shop now</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
        @if ($newProducts->isNotEmpty())
                            @foreach($newProducts as $product)
                            @php
                                $productImage = $product ->product_images;
                            @endphp
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                @if(!empty($productImage->image))
                            <div class="product__item__pic set-bg" data-setbg="{{asset('front-assets/img/product/product-1.jpg')}}">
                            @else
                            <div class="product__item__pic set-bg" data-setbg="{{asset('front-assets/img/product/product-1.jpg')}}">
                            @endif
                        <ul class="product__hover">
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="javascript:void(0);" onclick="addToCart({{$product->id}});"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{$product->title}}</a></h6>
                        <div class="product__price">$ {{$product->price}}
                            @if($product->compare_price > 0)
                            <span>$ {{$product->compare_price}}</span>
                            @endif</div>
                    </div>
                </div>
            </div>
            @endforeach
                    @endif

        </div>
    </div>
</section>
<!-- Product Section End -->



<!-- Trend Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Featured product</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
        @if ($featuredProducts->isNotEmpty())
                            @foreach($featuredProducts as $product)
                            @php
                                $productImage = $product ->product_images;
                            @endphp
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                @if(!empty($productImage->image))
                            <div class="product__item__pic set-bg" data-setbg="{{asset('front-assets/img/product/product-1.jpg')}}">
                            @else
                            <div class="product__item__pic set-bg" data-setbg="{{asset('front-assets/img/product/product-1.jpg')}}">
                            @endif
                        <ul class="product__hover">
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="javascript:void(0);" onclick="addToCart({{$product->id}});"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{$product->title}}</a></h6>
                        <div class="product__price">$ {{$product->price}}
                            @if($product->compare_price > 0)
                            <span>$ {{$product->compare_price}}</span>
                            @endif</div>
                    </div>
                </div>
            </div>
            @endforeach
                    @endif

        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Services Section Begin -->


@endsection
