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
                    <img src="{{ asset('images/benguela/multicaixa.png') }}" style="width: 150px;">

                    <p><b>Para proceder ao pagamento no multicaixa, siga os seguintes passos:</b>w</p><br>
                    <p><b>1º</b> Pagamentos > <b>2º</b>Pagamento por Referência> <b>3º</b>Preencher Campos> <b>4º</b>
                        Efectuar Pagamento.</p>
                    <a class="btn btn-warning btn-lg" style="background: #fafafa;">
                        Referência: {{ $order->payment->reference }}<br>
                        Valor: {{ $order->total }}kz</a>
                    <br><br><br>
                    OU

                    <br><br><br>
                    <p><b>1º</b> Pagamentos > <b>2º</b>Pagamento por Referência> <b>3º</b>Preencher Campos> <b>4º</b>
                        Efectuar Pagamento.</p>
                    <a class="btn btn-warning btn-lg" style="background: #fafafa;">
                        Entidade: 99108<br>
                        Referência: {{ $order->payment->reference }}<br>
                        Valor: {{ $order->total }}kz</a>
                    <br><br><br>

                    <p><b>A confirmação do seu pagamento pode demorar até 1h.</b></p>
                    <p><b>A sua encomenda será enviada assim que o pagamento for confirmado.</b></p>


                    <a href="{{ url('/') }}/orders/{{ $order->id }}" class="btn btn-warning btn-lg"
                        style="border-radius: 4px; background: #0C8CE4; color:#ffff"><B>Visualizar Pedido</B></a>

                </div>

            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
