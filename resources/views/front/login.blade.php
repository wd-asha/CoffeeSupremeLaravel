@extends('layouts.login')
@section('title', 'Coffee Supreme - Login')
@section('content')

<div class="wrapper">

    <div class="breadcrumbs">
        <h6>
            <a href="{{ route('front') }}">Home</a>
            <i class="fas fa-caret-right"></i>
            <span>Login</span>
        </h6>
    </div>

    <div class="login">
        <div class="login-img">
            <img src="{{ asset('images/login.jpg') }}" alt="">
        </div>
        <div class="login-form">
            <h2>Login</h2>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-control">
                    <label for="emailInput"></label>
                    <input type="email" placeholder="E-mail" id="emailInput" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                </div>
                <div class="form-control">
                    <label for="passInput"></label>
                    <input type="password" placeholder="Password" id="passImput" name="password" required autocomplete="current-password">
                    <div class="forgot">
                        <a href="{{ route('password.reque') }}">Forgot?</a>
                    </div>
                </div>
                <div class="btn-box">
                    <button type="submit" class="login-link">Login
                        <div class="product_btn_back"></div>
                    </button>
                </div>
            </form>
            <p>Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
        </div>
    </div>

</div>
@endsection
