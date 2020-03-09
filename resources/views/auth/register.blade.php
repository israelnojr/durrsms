@extends('layouts.front.app')

@section('content')
<section class="login-main-wrapper">
    <div class="container-fluid pl-0 pr-0">
        <div class="row no-gutters">
            <div class="col-md-5 p-5 bg-white full-height">
                <div class="login-main-left">
                    <div class="text-center mb-5 login-main-left-header pt-4">
                    <img src="{{asset('front/img/favicon.png')}}" class="img-fluid" alt="LOGO">
                    <h5 class="mt-3 mb-3">Welcome to {{config('app.name')}}</h5>
                    <p> 
                        {{config('app.name')}} is a Mobile Marketing solution  every marketing team should have <br> 
                        It is mostly imprtant that your message will be delivered to destination on time.
                    </p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('FullName')}}</label>
                        <input name="name" type="name" class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Enter your full name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Email')}}</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Enter your email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Confirm Password')}}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign In</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="text-center mt-5">
                    <p class="light-gray">Already own an account? <a href="{{ route('login') }}">Sign In</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="login-main-right bg-white p-5 mt-5 mb-5">
                    <div class="owl-carousel owl-carousel-login">
                    <div class="item">
                        <div class="carousel-login-card text-center">
                            <img src="{{asset('front/img/login.png')}}" class="img-fluid" alt="LOGO">
                            <h5 class="mt-5 mb-3">​Swift & Reliable</h5>
                            <p class="mb-4">{{config('app.name')}} has a global coverage of 220 Countries <br>and more than 960 Networks.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-login-card text-center">
                            <img src="{{asset('front/img/login.png')}}" class="img-fluid" alt="LOGO">
                            <h5 class="mt-5 mb-3">​One Stop Mobile Marketing Solution</h5>
                            <p class="mb-4">Manage your time and marketing resources more efficiently.
                                One Data Base - Various opportunities such as : Text Messages (SMS), Voice messages Wap Push, 2 way SMS and much more...</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-login-card text-center">
                            <img src="{{asset('front/img/login.png')}}" class="img-fluid" alt="LOGO">
                            <h5 class="mt-5 mb-3">​Swift & Reliable</h5>
                            <p class="mb-4">{{config('app.name')}} has a global coverage of 220 Countries <br>and more than 960 Networks.</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
