@extends('layouts.master')
@section('title', 'Contacto')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
@endsection
@section('content')

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">
                            <center>Actualizar o Endereço: {{ $address->name }}</center>
                        </div>

                        <form action="{{ route('address.update', $address->id) }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="redirect-to" value="/address">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nome</label>
                                    <input type="text" name="name" class="form-control" id="inputEmail4"
                                        placeholder="nome" value="{{ $address->name }}" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">email</label>
                                    <input type="email" name="email" class="form-control" id="inputPassword4"
                                        placeholder="email" value="{{ $address->email }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Endereço</label>
                                <input type="text" name="endereco" class="form-control" id="inputAddress"
                                    placeholder="morada" value="{{ $address->endereco }}">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress2">Ponto de Referencia</label>
                                <input type="text" name="ponto_referencia" class="form-control" id="inputAddress2"
                                    placeholder="Apartment, studio, or floor" value="{{ $address->ponto_referencia }}">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress2">País</label>
                                <input type="text" name="pais" class="form-control" id="inputAddress2"
                                    placeholder="País" value="{{ $address->pais }}">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Provincia</label>
                                    <input type="text" name="provincia" class="form-control" id="inputAddress2"
                                        placeholder="Provincia" value="{{ $address->provincia }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Municipio</label>
                                    <input type="text" name="municipio" class="form-control" id="inputAddress2"
                                        placeholder="Municipio" value="{{ $address->municipio }}">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="inputZip">Telefone</label>
                                    <input type="text" name="telefone" class="form-control" id="inputZip"
                                        value="{{ $address->telefone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress2">OBS: Digite a sua observação</label>
                                <textarea type="text" name="identificacao" class="form-control" id="inputAddress2"> {{ $address->identificacao }}</textarea>
                            </div>

                            <br>
                            <button type="submit" id="complete-order" class="btn btn-info btn-lg"
                                style="margin-left: 740px;">Completar Compra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
