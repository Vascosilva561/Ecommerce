@extends('layouts.master')
@section('title', 'Contacto')
@section('content')
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/css/bootstrap.css') }}">

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <h4 style="color: white;">O TEU ENDEREÇO DE ENTREGA</h4>
                <div class="col-md-6" align="center">
                    <p style="font-size: 18px; margin-top: 30px;"><B>DADOS DE PAGAMENTO</B></p>
                    <hr>
                    {{-- <img src="{{ asset('images/benguela/multicaixa.png') }}" style="width: 150px;"> --}}

                    <p><b>Para proceder ao pagamento por transferência bancária, siga os seguintes passos:</b>w</p><br>
                    <p>
                        <b>1º</b> Vá até o aplicativo do banco>
                        <b>2º</b>Efetue a Transferência>
                        <b>3º</b>Envio o Comprovativo>
                    </p>

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

                    <p><b>A confirmação do seu pagamento pode demorar até 48h.</b></p>
                    <p><b>A sua encomenda será enviada assim que o pagamento for confirmado.</b></p>


                    <div class="row mb-2 justify-content-center">
                        @if ($order->payment->status === 'Pendente' || $order->payment->status === 'Aguardando Confirmação')
                            <button class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#uploadReceiptModal">Enviar
                                Recibo de Transferência
                            </button>
                        @endif

                        @include('orders.components.upload-receipt-modal', [
                            'order' => $order,
                        ])
                    </div>
                    <div class="row mb-4 justify-content-center">
                        <a href="{{ url('/') }}/orders/{{ $order->id }}"
                            class="btn btn-primary btn-lg"><B>Visualizar
                                Pedido</B></a>
                    </div>


                </div>

            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
