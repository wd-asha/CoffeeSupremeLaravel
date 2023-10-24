@extends('layouts.app')

@section('content')

    <style>
        .login {
            width: 100%;
            margin: 2rem 0 0 0;
            display: grid;
            grid-template-columns: 30% 30% 40%;
            grid-template-areas:
                "loginImg loginImg loginForm";
            border-top: 1px solid rgba(70, 70, 70, .2);
            border-bottom: 1px solid rgba(70, 70, 70, .2);
        }

        h2 {
            font-size: 3rem;
            font-family: 'Knockout-27', sans-serif;
            text-transform: uppercase;
            color: rgba(70, 70, 70, .9);
            width: 100%;
            padding: 0 0 2rem 0;
            letter-spacing: .03rem;
        }

        .login-img {
            grid-area: loginImg;
            padding: 2.5rem 2.5rem 2.5rem 0;
        }

        .login-img img {
            width: 100%;
        }

        .login-form {
            grid-area: loginForm;
            padding: 2.5rem;
            border-left: 1px solid rgba(70, 70, 70, .2);
        }

        .form-control {
            border-bottom: 1px solid rgba(70, 70, 70, .2);
            position: relative;
        }

        .form-control input {
            color: rgba(70, 70, 70, 1);
            width: 100%;
            font-family: 'Montserrat-Regular', sans-serif;
            font-size: .9rem;
            padding: 1rem;
            border: none;
            outline: none;
        }

        .form-control input:focus {
            border-bottom: 1px solid #D22226;
        }

        .form-control:before {
            content: "";
            position: absolute;
            width: 0;
            height: 1px;
            left: 0;
            bottom: 0;
            background-color: rgba(70, 70, 70, .2);
            transition: .5s;
        }

        .btn-box {
            width: 100%;
            margin: 2rem auto;
        }

        .product_btn_back {
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background-color: rgba(210, 34, 38, 1);
            transition: .5s;
            z-index: -1;
            cursor: pointer;
        }

        .login-link {
            box-sizing: border-box;
            width: 100%;
            padding: .66rem 0;
            text-transform: uppercase;
            font-size: .9rem;
            line-height: 1.2rem;
            color: rgba(210, 34, 38, 1);
            transition: .5s;
            display: inline-block;
            border: 1px solid rgba(210, 34, 38, 1);
            text-align: center;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            letter-spacing: .02rem;
            background-color: transparent;
            font-family: 'Montserrat-Regular', sans-serif;
            cursor: pointer;
        }
    </style>


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

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-control">
                            <label for="email"></label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-control">
                            <label for="password"></label>
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-control">
                            <label for="password-confirm"></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
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
