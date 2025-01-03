@extends('layouts.master')
@section('title', 'Contacto')
@section('content')
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/new.css') }}">

    <script src="https://js.stripe.com/v3/"></script>


@section('content')
    <style type="text/css">
        table td {
            padding: 10px;
        }
    </style>

    <section id="cart_items">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-3 well well-sm">
                    <div class="card border-secondary mb-3" style="max-width: 18rem ">
                        <div class="card-header"> Menu Perfil </div>
                        <div class="card-body text-secondary">
                            <nav class="nav flex-column">
                                <a class="nav-link" href="{{ '/profile' }}">Meu Perfil</a>
                                <a class="nav-link" href="{{ '/orders' }}">Meus Pedidos</a>
                                <a class="nav-link" href="{{ '/address' }}">Meu Endereço</a>
                                <a class="nav-link" href="{{ '/password' }}">Mudar Senha</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <h3><span style="color: green;">{{ ucwords(Auth::user()->name) }}</span>, Seu Endereço</h3>
                    <div class="container">
                        @if (session('msg'))
                            <div class="alert alert-info">{{ session('msg') }}</div>
                        @endif
                        <form action="{{ url('updateAddress') }}" method="post" role="form" multpart="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @foreach ($address as $value)
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="fullname"></label>
                                    <input type="text" class="form-control" name="name" value="{{ $value->name }}"
                                        id="fullname" placeholder="">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>


                                <div class="form-group {{ $errors->has('endereco') ? 'has-error' : '' }}">
                                    <label for="city"></label>
                                    <input type="text" class="form-control" name="endereco"
                                        value="{{ $value->endereco }}" id="endereco" placeholder="">
                                    <span class="text-danger">{{ $errors->first('endereco') }}</span>
                                </div>


                                <div class="form-group {{ $errors->has('ponto_referencia') ? 'has-error' : '' }}">
                                    <label for="ponto_referencia"></label>
                                    <input type="text" class="form-control" name="ponto_referencia"
                                        value="{{ $value->ponto_referencia }}" id="ponto_referencia" placeholder="">
                                    <span class="text-danger">{{ $errors->first('ponto_referencia') }}</span>
                                </div>

                                <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                                    <label for="telefone"></label>
                                    <input type="text" class="form-control" name="telefone"
                                        value="{{ $value->telefone }}" id="telefone" placeholder="">
                                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                                </div>

                                <div class="form-group {{ $errors->has('pais') ? 'has-error' : '' }}">
                                    <label for="pais"></label>
                                    <input type="text" class="form-control" name="pais" value="{{ $value->pais }}"
                                        id="pais" placeholder="">
                                    <span class="text-danger">{{ $errors->first('pais') }}</span>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary"> Actualizar </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>




    <script>
        (function() {
            // Create a Stripe client.
            var stripe = Stripe('pk_test_QMEu7ijC9pMy8InyuXQnSUI900CFzQHvKE');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                document.getElementById('complete-order').disabled = true;

                var options = {

                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value
                }

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;




                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        })();
    </script>
@endsection
