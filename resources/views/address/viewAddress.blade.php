@extends('layouts.master')
@section('title', 'Contacto')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_responsive.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/css/bootstrap.css') }}">
@endsection
@section('content')

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <form action="" method="post" style="width: 80%;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">
                                <p style="margin-top: 20px; margin-right: 15px; color: black;"><b>Escolher um endereço de
                                        entrega</b></p>
                            </span>
                        </div>
                        @foreach ($addresses as $address)
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                                value="{{ $address->identificacao }} - {{ $address->endereco }} - {{ $address->ponto_referencia }}"
                                name="endereco" style="color: black;">
                        @endforeach
                    </div>
                    <p style="color: red;">Obs: O endereço de entrega será usado como endereço de facturação.</p>
                </form>

                <br><br><br><br><br><br><br><br>
                <style type="text/css">
                    p {
                        color: black;
                        font-size: 14px;
                    }
                </style>
                <div class="col-md-6">
                    <h4>O TEU ENDEREÇO DE ENTREGA</h4>
                    <hr>
                    @foreach ($addresses as $address)
                        <p>{{ $address->name }}</p>
                        <p>{{ $address->endereco }}</p>
                        <p>{{ $address->provincia }}</p>
                        <p>{{ $address->pais }}</p>
                        <p>{{ $address->municipio }}</p>
                        <p>{{ $address->telefone }}</p>
                        <p>{{ $address->ponto_referencia }}</p>

                        <a href="{{ route('address.edit', $address->id) }}" id="complete-order"
                            class="btn btn-primary btn-lg">Actualizar</a>
                    @endforeach

                </div>

                <div class="col-md-6">
                    <h4>O TEU ENDEREÇO DE FACTURAÇÃO</h4>
                    <hr>
                    @foreach ($addresses as $address)
                        <p>{{ $address->name }}</p>
                        <p>{{ $address->endereco }}</p>
                        <p>{{ $address->provincia }}</p>
                        <p>{{ $address->pais }}</p>
                        <p>{{ $address->municipio }}</p>
                        <p>{{ $address->telefone }}</p>
                        <p>{{ $address->ponto_referencia }}</p>
                    @endforeach
                </div>

                <a href="{{ route('checkout.index') }}" id="complete-order" class="btn btn-danger btn-lg"
                    style="margin-left: 1100px; background-color: #a3241e;">Continuar</a>

            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection
<script src="{{ asset('js/app.js') }}"></script>
