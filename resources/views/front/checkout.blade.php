
@extends('front.layouts.master')
@section('main-content')

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                
            </div>
            <form action="#" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" placeholder="Street Address">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                    <div class="checkout__form__checkbox">
                                        <label for="note">
                                            Note about your order, e.g, special noe for delivery
                                            <input type="checkbox" id="note">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Oder notes <span>*</span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, special noe for delivery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        @foreach ( Cart::content() as $item )
                                        <li>{{$item->name}} <span>${{$item->price*$item->qty}}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span>$ {{Cart::subtotal()}}</span></li>
                                        <li>Total <span>$ {{Cart::subtotal()}}</span></li>
                                    </ul>
                                </div>
                                <div class=" " >
                                <input checked type="radio" name="payment_method" value="cod" id="payment_method_one">
                                    <label for="payment_method_one" >COD</label>
                                </div>
                                <div class="">
                                <input type="radio" name="payment_method" value="Credit" id="payment_method_two">
                                    <label for="payment_method_two">Credit Card</label>
                                </div>
                                <div id="card-payment-form" class="d-none">
                                    <strong>Card payment using QR code</strong>
                                    <label for="">Subject: "Name + phone number"</label>
                                    <img src="https://toanhocbactrungnam.vn/uploads/news/2019_11/1573006985.png" alt="">
                                </div>
                                <button type="submit" class="site-btn">Place oder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

        <!-- Instagram Begin -->
    @endsection
    @section('customJs')
    <script>
        $("#payment_method_one").click(function(){
            if($(this).is(":checked")==true){
                $('#card-payment-form').addClass('d-none');
            }
        });
        $("#payment_method_two").click(function(){
            if($(this).is(":checked")==true){
                $('#card-payment-form').removeClass('d-none');
            }
        });
    </script>
    @endsection

