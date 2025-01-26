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
                    <p style="font-size: 18px;"><B>PAGAMENTO POR REFERÊNCIA</B></p>
                    <hr>
                    <img src="{{ asset('images/benguela/multicaixa.png') }}" style="width: 150px;">
                    <p>Escolheste pagamento por referência</p>
                    <p>Aqui tens um pequeno resumo da sua encomenda</p>
                    <p>O total a pagar pela sua encomenda e: <b style="color: #0f8ce4;">{{ $newTotal }}kz</b></p>
                    <p>As informações para pagamento por referençia Multicaixa serão apresentada na próxima página! </p>
                    <p>Por favor confirme a sua encomenda clicando "Confirmar Encomenda" </p>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="cart_buttons text-center" align="center">
                    <form method="POST" action="{{ route('orders.create', ['method' => 'reference']) }}">
                        @csrf
                        <button type="sumbit" class="btn btn-warning px-4 btn-lg text-uppercase"
                            style="background: linear-gradient(to bottom, #ff0000 0%, #ff9933 100%);"><B>Confirmo
                                a minha Encomenda</B></button>
                    </form>
                    {{-- <a href="{{ route('checkout.index') }}"  class="button cart_button_clear">Add to Cart</a> --}}
                    {{-- <a href="{{ route('faturaProforma') }}" class="btn btn-warning btn-lg"
                        style="width: 450px; margin-right: 700px; background: linear-gradient(to bottom, #003366 0%, #666633 100%);"><B>PAGAR
                            POR TRANFERÊNCIA BANCÁRIA</B></a> --}}
                    {{-- <a href="{{ route('formpayment.formasPagamento') }}"  class="btn btn-warning btn-lg">Forma de Pagamento</a> --}}
                </div>





            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection
<script src="{{ asset('js/app.js') }}"></script>
