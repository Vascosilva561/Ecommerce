@extends('layouts.master')

@section('title', 'Reset Password')

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
            <div class="row">
                <div class="col">
                    <div class="card my-auto">
                        <div class="card-header">{{ __('Redefinir Senha') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}"
                                aria-label="{{ __('Reset Password') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Enviar Link de Redifinição de Senha.') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
