@extends('layouts.login')
@section('title', 'Coffee Supreme - Reset password')
@section('content')

<div class="wrapper">

    <div class="breadcrumbs">
        <h6>
            <a href="{{ route('front') }}">Home</a>
            <i class="fas fa-caret-right"></i>
            <span>Reset password</span>
        </h6>
    </div>

    <div class="login">
        <div class="login-img">
            <img src="{{ asset('images/login.jpg') }}" alt="">
        </div>
        <div class="login-form">
            <h2>Reset password</h2>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-control">
                    <label for="email"></label>
                    <input type="email" placeholder="E-mail" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="form-control">
                    <label for="password"></label>
                    <input type="password" placeholder="Password" id="password" name="password" required autocomplete="new-password">
                </div>
                <div class="form-control">
                    <label for="password-confirm"></label>
                    <input type="password" placeholder="Password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="btn-box">
                    <button type="submit" class="login-link">Reset password
                        <div class="product_btn_back"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
