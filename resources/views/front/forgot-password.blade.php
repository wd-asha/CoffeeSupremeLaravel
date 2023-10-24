@extends('layouts.login')
@section('title', 'Coffee Supreme - Forgot password')
@section('content')

<div class="wrapper">

    <div class="breadcrumbs">
        <h6>
            <a href="{{ route('front') }}">Home</a>
            <i class="fas fa-caret-right"></i>
            <span>Forgot password</span>
        </h6>
    </div>

    <div class="login">
        <div class="login-img">
            <img src="{{ asset('images/login.jpg') }}" alt="">
        </div>
        <div class="login-form">
            <h2>Forgot password</h2>
            <form method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="form-control">
                    <label for="emailInput"></label>
                    <input type="email" placeholder="E-mail" id="emailInput" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                </div>
                <div class="btn-box">
                    <button type="submit" class="login-link">Send reset link
                        <div class="product_btn_back"></div>
                    </button>
                </div>
                @if(session('status'))
                    <p>A link to reset your password has been sent to your email</p>
                @endif
            </form>
        </div>
    </div>

</div>
@endsection
