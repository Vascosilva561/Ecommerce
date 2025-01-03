@extends('layouts.master')
@section('title', 'Contacto')
@section('content')
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/new.css') }}">

    <script src="https://js.stripe.com/v3/"></script>


    <!-- Cart -->
    <div class="shop" style="margin-top: 100px; font-family:Cambria; ">
        <div class="container">
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12 offset-lg-12">
                    <div class="cart_container">
                        <table class="table">
                            <tr>
                                <th>IMAGEM</th>
                                <th>NOME</th>
                                <th>DiSPONIBLIDADE</th>
                                <th>QUANTIDADE</th>
                                <th>PREÇO UNT.</th>
                            </tr>

                            <?php $count = 1; ?>

                            @foreach (Cart::content() as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <img src="{{ asset('images/product/' . $item->model->image) }}"
                                                style="width: 120px;" alt="">
                                        </a>
                                    </td>

                                    <td>
                                        <div class="cart_item_text">
                                            <div class="cart_item_text">
                                                <p style="color: black;"><b>{{ $item->model->name }}</b></p>
                                            </div>
                                        </div>

                                    </td>

                                    <td>
                                        <div class="cart_item_text">
                                            <p style="color: black;"><b>EM STOCK</b></p>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="cart_item_text">
                                            <div class="cart_item_text">
                                                <p style="color: black;"><b>{{ $item->qty }}</b></p>
                                            </div>
                                        </div>
                                    </td>



                                    <td>
                                        <div class="cart_item_text" style="color: #df3b3b;">
                                            <b>{{ $item->model->presentPrice() }}Kz</b></div>
                                    </td>


                                </tr>
                            @endforeach
                        </table>

                        @if (session()->has('coupon'))
                            <p>Disconto ({{ session()->get('coupon')['name'] }}) :
                            <form action="{{ route('coupon.destroy') }}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" style="font-size: 12px;">Remover</button>
                            </form>
                            <span class="price" style="color:black"><b> - {{ $discount }}</b></span>
                            </p>
                            <p>new Subtotal <span class="price" style="color:black"><b>{{ $newSubtotal }}</b></span></p>
                        @endif
                        <br>

                        @if (!session()->has('coupon'))
                            <form action="{{ route('coupon.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="coupon_code" id="coupon_code" style="width: 900px;">
                                <button type="submit" class="button button-plain" style="width: 234px;">Apply</button>
                            </form>
                        @endif


                        <div class="cart_items" style="margin-top: -10px;">
                            <ul class="cart_list">
                                <li class="cart_item clearfix">
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title"><b>SUBTOTAL</b></div>
                                            <div class="cart_item_text">{{ $newSubtotal }}kz</div>

                                        </div>

                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title"><b>TAX (13%)</b></div>
                                            <div class="cart_item_text"><span>{{ $newTax }}kz</span></div>
                                        </div>

                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title"><b>TOTAL</b></div>
                                            <div class="cart_item_text"> <b>{{ $newTotal }}kz</b></div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>


                        <div class="cart_buttons" align="center">
                            {{-- <a href="{{ route('checkout.index') }}"  class="button cart_button_clear">Add to Cart</a> --}}
                            <a href="{{ url('faturaProforma') }}" class="btn btn-warning btn-lg"
                                style="width: 500px; margin-right: 700px; background: linear-gradient(to bottom, #003366 0%, #666633 100%);"><B>PAGAR
                                    POR TRANFERENCIA BANCARIA</B></a>
                            {{-- <a href="{{ route('formpaymant.formasPagamento') }}"  class="btn btn-warning btn-lg">Forma de Pagamento</a> --}}
                            <a href="{{ route('resumo.create') }}" class="btn btn-warning btn-lg"
                                style="width: 550px; margin-top:-80px; background: linear-gradient(to bottom, #ff0000 0%, #ff9933 100%);"><B>PAGAR
                                    POR REFERENÇIA MULTICAIXA</B></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
