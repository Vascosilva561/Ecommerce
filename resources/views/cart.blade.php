@extends('layouts.master')
@section('title', 'Contacto')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
@endsection
@section('content')

    <script>
        $(document).ready(function() {
            <?php for($i=1;$i<20;$i++){?>
            $('#upCart<?php echo $i; ?>').on('change keyup', function() {
                var newqty = $('#upCart<?php echo $i; ?>').val();
                var rowId = $('#rowId<?php echo $i; ?>').val();
                var proId = $('#proId<?php echo $i; ?>').val();
                if (newqty <= 0) {
                    alert('Introduza quantidade valida')
                } else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/cart/update'); ?>/' + proId,
                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                        success: function(response) {
                            console.log(response);
                            $('#updateDiv').html(response);
                        }
                    });
                }
            });
            <?php } ?>
        });
    </script>

    <!-- Cart -->
    <div class="cart_section">
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

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (Cart::count() > 0)
                <section id="cart_items">
                    <div class="container">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li class="active" style="color: black; font-size: 18px;">{{ Cart::count() }} item(s) no
                                    Carrinho de compras</li>
                            </ol>
                        </div>
                    </div>
                </section>

                <div class="row">
                    <div class="col-lg-12 offset-lg-12">
                        <div class="cart_container">
                            <table class="table">
                                <tr>
                                    <th>IMAGEM</th>
                                    <th>NOME</th>
                                    <th>QUANTIDADE</th>
                                    <th>REMOVER</th>
                                    <th>C/MAIS TARDE</th>
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
                                            <p style="color: black; margin-top: 50">{{ $item->model->name }}</p>
                                        </td>

                                        <td>
                                            <form action="{{ url('cart/update', $item->rowId) }}" method="POST"
                                                role="form">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="proId" value="{{ $item->id }}">
                                                <input type="number" size="3" name="qty"
                                                    value="{{ $item->qty }}" id="upCart<?php echo $count; ?>"
                                                    autocomplete="off"
                                                    style="text-align:center; max-width:50px; margin-top: 50px;"
                                                    MIN="1" MAX="1000">
                                                <button type="submit" value="Actualizar"
                                                    style="width: 0px; height: 0px; background-color: white; border: 0px; "><img
                                                        src="{{ asset('images/icons/actualizar.png') }}"
                                                        style="width: 35px; height: 35px; margin-top: 0px;"></button>
                                            </form>
                                        </td>

                                        <td>
                                            <div class="cart_item_text">
                                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit"
                                                        style="width: 0px; height: 0px; background-color: white; border: 0px;">
                                                        <img src="{{ asset('images/icons/apagar.png') }}"
                                                            style="width: 40px; height: 40px; margin-top: 0px;">
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="cart_item_text">
                                                <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="submit"
                                                        style="width: 0px; height: 0px; background-color: white; border: 0px;"><img
                                                            src="{{ asset('images/icons/voltar.png') }}"
                                                            style="width: 40px; height: 40px; margin-top: 0px;">
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="cart_item_text" style="color: #df3b3b;">
                                                <b>{{ $item->model->presentPrice() }}Kz</b>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>

                            <div class="cart_items">
                                <ul class="cart_list">
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"><b>SUBTOTAL</b></div>
                                                <div class="cart_item_text">{{ presentPrice(Cart::subtotal()) }}kz</div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title"><b>TAX (13%)</b></div>
                                                <div class="cart_item_text"><span
                                                        style="width: 200px;">{{ presentPrice(Cart::tax()) }}kz</span>
                                                </div>
                                            </div>

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title"><b>TOTAL</b></div>
                                                <div class="cart_item_text"> <b>{{ presentPrice(Cart::total()) }}kz</b>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="cart_buttons">
                                {{-- <a href="{{ route('checkout.index') }}"  class="button cart_button_clear">Add to Cart</a> --}}
                                <a href="{{ url('faturaProforma') }}" class="btn btn-info btn-lg">Fatura Proforma</a>
                                {{-- <a href="{{ route('formpayment.formasPagamento') }}"  class="btn btn-warning btn-lg">Forma de Pagamento</a> --}}
                                <a href="{{ route('address.viewAddress') }}" class="btn btn-warning btn-lg"
                                    style="background-color: #a12422; color: white">Continuar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <section id="cart_items">
                    <div class="container">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li class="active">Carrinho de compras</li>
                            </ol>
                        </div>

                        <div align="center"> <img src="{{ asset('images/benguela/empty-cart.png') }}"></div>
                    </div>
                </section> <!--/#cart_items-->

                <a href="{{ route('shop.index') }}" class="btn btn-warning btn-lg"> Continuar Comprando</a>

            @endif

            @if (Cart::instance('saveForLater')->count() > 0)

                <div class="row">
                    <div class="col-lg-12 offset-lg-12">
                        <div class="cart_container">
                            <div class="cart_items">
                                <section id="cart_items">
                                    <div class="container">
                                        <div class="breadcrumbs">
                                            <ol class="breadcrumb">
                                                <li class="active" style="color: #dc3545;">
                                                    {{ Cart::instance('saveForLater')->count() }} item(s) Adicionado para
                                                    mais tarde
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </section>

                                <table class="table">
                                    <tr>
                                        <th>IMAGEM</th>
                                        <th>NOME</th>
                                        <th>QUANTIDADE</th>
                                        <th>REMOVER</th>
                                        <th>C/MAIS TARDE</th>
                                        <th>PREÇO UNT.</th>
                                    </tr>

                                    @foreach (Cart::instance('saveForLater')->content() as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ route('shop.show', $item->model->slug) }}">
                                                    <img src="{{ asset('images/product/' . $item->model->image) }}"
                                                        style="width: 120px;" alt="">
                                                </a>
                                            </td>

                                            <td>
                                                <p style="color: black; margin-top: 50">{{ $item->model->name }}</p>
                                            </td>

                                            <td>
                                                <div class="cart_item_text"><span>{{ $item->qty }}</span></div>
                                            </td>

                                            <td>
                                                <div class="cart_item_text">
                                                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger" styel="margin:5px"
                                                            style="margin-top: -14px;">REMOVER</button>
                                                    </form>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="cart_item_text">
                                                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-info"
                                                            style="margin-top: -14px;">AD/ AO CARRINHO</button>
                                                    </form>
                                                </div>
                                            </td>


                                            <td>
                                                <div class="cart_item_text">{{ $item->model->presentPrice() }},00Kz</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- <h4>Nao existe item salvo para mais tarde</h4> --}}

            @endif
        </div>
    </div>

    @include('relacionados')

@endsection
<script src="{{ asset('js/app.js') }}"></script>

<script>
    (function() {
        const classname = document.querySelectorAll('.quantity');
        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function() {
                const id = element.getAttribute('data-id');
                axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function(response) {
                        //console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        });
    })();
</script>
