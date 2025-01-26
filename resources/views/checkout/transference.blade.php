@extends('layouts.master')
@section('title', 'Contacto')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_responsive.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/css/bootstrap.css') }}">

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <h4 style="color: white;">O TEU ENDEREÇO DE ENTREGA</h4>

                <div class="col-md-6" align="center">
                    <p style="font-size: 18px;"><B>PAGAMENTO POR TRANSFERENCIA BANCÁRIA</B></p>
                    <hr>
                    {{-- <img src="{{ asset('images/benguela/multicaixa.png') }}" style="width: 150px;"> --}}
                    <p>Escolheste pagamento por transferência bancária</p>
                    <p>Aqui tens um pequeno resumo da sua encomenda</p>
                    <p>O total a pagar pela sua encomenda e: <b style="color: #0f8ce4;">{{ $newTotal }}kz</b></p>
                    <p>As informações para pagamento por transferência bancária estão apresentadas logo abaixo! </p>
                    <p>Por favor selecione uma das opções abaixo para fazer transferencia</p>

                </div>
            </div>



            <div class="row justify-content-center">
                <div class="col" align="center">
                    <p>Por favor selecione uma das opções abaixo para fazer transferencia</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Banco</th>
                                <th>Nome</th>
                                <th>IBAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank_accounts as $bank_account)
                                <tr>
                                    <td>{{ $bank_account->bank }}</td>
                                    <td>{{ $bank_account->name }}</td>
                                    <td>{{ $bank_account->iban }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form method="POST" action="{{ route('orders.create', ['method' => 'transference']) }}">
                        @csrf
                        <button type="submit" class="btn btn-warning px-4 btn-lg text-uppercase"
                            style="background: linear-gradient(to bottom, #ff0000 0%, #ff9933 100%);">
                            <b>Confirmar Encomenda</b>
                        </button>
                    </form>
                </div>



            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection
<script src="{{ asset('js/app.js') }}"></script>
