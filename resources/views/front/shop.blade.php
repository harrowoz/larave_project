@extends('front.layouts.master')
@section('main-content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4 >Categories</h4>
                            </div>
                           @if($categories->isNotEmpty())
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">   
                                    <div class="card">
                                        @foreach($categories as $category)
                                         <a href="{{ route("front.shop",[$category->type,$category->slug])}}" > <button type="button" class="list-group-item list-group-item-action">{{$category->name}}</button></a>
                                         @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="99"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="">Filter</a>
                        </div>
                        
                    </div>
                </div>

                <div class="col-lg-9 col-md-9">
                    <div class="row">
                    @if ($products->isNotEmpty())
                            @foreach($products as $product)
                            @php
                                $productImage = $product ->product_images;
                            @endphp
                        <div class="col-lg-4 col-md-6">
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
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection