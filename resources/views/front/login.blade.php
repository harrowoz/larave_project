
@extends('front.layouts.master')
@section('main-content')
<!-- Login Begin -->
<section class="checkout spad">

        <div class="container">
            <form action="{{ route('postLogin') }}" method="POST" class="checkout__form">
                @csrf
                <div class="row">
                <div class="col-sm-3"></div>

                    <div class="col-sm-6">
                    <form>
                    <div class="text-center mb-3">
                          <h5>Sign in here:</h5>
                          @if ($message = Session::get('error'))

                        <div class="alert alert-danger alert-block">

	                        <button type="button" class="close" data-dismiss="alert">×</button>	

                         <strong>{{ $message }}</strong>

                </div>

            @endif
                          </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                              <input type="email" id="form2Example1" class="form-control" name="email"/>
                              <label class="form-label" for="form2Example1">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                              <input type="password" id="form2Example2" class="form-control" name="password"/>
                              <label class="form-label" for="form2Example2">Password</label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                              <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                  <label class="form-check-label" for="form2Example31"> Remember me </label>
                                </div>
                              </div>

                              <div class="col">
                                <!-- Simple link -->
                                <a href="#!">Forgot password?</a>
                              </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-danger btn-block mb-4">Sign in</button>
                            <!-- Register buttons -->
                            <div class="text-center">
                              <p>Not a member? <a href="register">Register</a></p>
                            </div>
                          </form>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Login End -->

        @endsection
    

