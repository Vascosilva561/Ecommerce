{{-- @extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}



@extends('layouts.master')
@section('title', 'Contacto')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">


    <link rel="icon" type="image/png" href="{{ asset('open/images/icons/favicon.ico') }}" />


    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('open/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('open/css/main.css') }}">
    <!--===============================================================================================-->
@endsection
@section('content')

    <body>
        <div class="container">
            <section id="cart_items" style="margin-top: 40px;">
                <div class="container">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li class="active" style="color: black; font-size: 18px;">Faça o seu login ou crie a sua conta
                            </li>
                        </ol>
                    </div>
                </div>
            </section>
            <div class="row justify-content-center">

                <div class="col-md-8">


                    <div class="limiter">
                        <div class="container-login100">
                            <div class="wrap-login100">
                                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}"
                                    aria-label="{{ __('Register') }}">
                                    @csrf

                                    <span class="login100-form-title p-b-26">
                                        {{ __('Registrar') }}
                                    </span>
                                    <span class="login100-form-title p-b-48">
                                        <i class="zmdi zmdi-font"></i>
                                    </span>

                                    <div class="wrap-input100 validate-input" data-validate = "Enter Name">
                                        <input id="name" type="text"
                                            class="input100{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                            value="{{ old('name') }}" required autofocus>
                                        <span class="focus-input100" for="email"
                                            data-placeholder="{{ __('Nome de Usuario') }}"></span>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                                        <input id="email" type="text"
                                            class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                            value="{{ old('email') }}" required>
                                        <span class="focus-input100" for="email"
                                            data-placeholder="{{ __('Email de Usuario') }}"></span>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                                        <span class="btn-show-pass">
                                            <i class="zmdi zmdi-eye"></i>
                                        </span>
                                        <input id="password" type="password" name="password"
                                            class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                        <span class="focus-input100" data-placeholder="{{ __('Palavra-passe') }}"></span>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                                        <span class="btn-show-pass">
                                            <i class="zmdi zmdi-eye"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="input100"
                                            name="password_confirmation" required>
                                        <span class="focus-input100"
                                            data-placeholder="{{ __('Confirmar Palavra-passe') }}"></span>

                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Lembrar') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="container-login100-form-btn">
                                        <div class="wrap-login100-form-btn">
                                            <div class="login100-form-bgbtn"></div>
                                            <button type="submit" class="login100-form-btn">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-4">


                    <div class="limiter" style="margin-top: 300px;">
                        <div class="container-login100">
                            <div class="wrap-login100">
                                <div class="container-login100-form-btn">
                                    <div class="wrap-login100-form-btn" style="margin-top: -50px;">
                                        <div class="login100-form-bgbtn"></div>
                                        <a href="{{ route('login') }}" class="login100-form-btn">Entrar</a>
                                    </div>
                                </div>
                            </div>
                            {{--  <a href="{{ url('auth/google') }}">GMAIL</a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>




        <div id="dropDownSelect1"></div>


    @endsection

    @section('script')
        <!--===============================================================================================-->
        <script src="{{ asset('open/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->

        <!--===============================================================================================-->

        <!--===============================================================================================-->

        <!--===============================================================================================-->

        <!--===============================================================================================-->
        <script src="{{ asset('open/js/main.js') }}"></script>
    @endsection
