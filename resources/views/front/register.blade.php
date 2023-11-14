@extends('front.layouts.master')
@section('main-content')
    <!-- Register Begin -->
    <section class="checkout spad">
        <div class="container">
            <form action="{{ route('postRegister') }}" method="POST" class="checkout__form">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Register here</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p> Name <span>*</span></p>
                                    <input type="text" id="name" name="name">
                                </div>
                            </div>
                            <div class="ccol-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" id="email" name="email">
                                </div>
                                </div>
                            <div class="ccol-lg-6 col-md-6 col-sm-6">
                              <div class="checkout__form__input">
                                    <p>Password <span>*</span></p>
                                    <input type="text" id="password" name="password">
                              </div>
                              </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Confirm Password <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="ccol-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" id="address" name="address">
                                </div>
                                </div>
                                <div class="ccol-lg-6 col-md-6 col-sm-6">
                              <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" id="phone" name="phone">
                              </div>
                              </div>
                            </div>
                            <button type="submit" class="primary-btn">Register</button>

                            <div class="col-lg-12">
                                
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </section>
        <!-- Register End -->
        @endsection
