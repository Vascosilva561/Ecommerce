@extends('layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_responsive.css') }}">
@endsection

@section('title', 'Pedido - ' . $order->id)

@section('content')
    <style type="text/css">
        table td {
            padding: 10px;
        }
    </style>

    <section id="cart_items">
        <div class="container">
            <br>
            <h3 style="text-align: center; text-decoration: margin-top: 40px;">
                <center>Pedido {{ $order->id }} (Referência: {{ $order->referens }})</center>
            </h3><br>

            <div class="row">

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Nome do Producto</th>
                                    <th>Código do Producto</th>
                                    <th>Quantidade</th>
                                    <th>Preço Unit</th>
                                    <th>Total</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order_products as $order_product)
                                    <tr>
                                        <td>
                                            <a href="{{ route('shop.show', $order_product->product->id) }}">
                                                <img src="{{ asset('images/product/' . $order_product->product->image) }}"
                                                    style="width: 120px;" alt="">
                                            </a>
                                        </td>
                                        <td>{{ ucwords($order_product->product->name) }}</td>
                                        <td>{{ $order->referens }}</td>
                                        <td>{{ $order_product->quantity }}</td>
                                        <td>{{ presentPrice($order_product->price) }}kz</td>
                                        <td>{{ presentPrice($order_product->total) }}kz</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="cart_items" style="margin-top: -10px;">
                        <ul class="cart_list">
                            <li class="cart_item clearfix">
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title"><b>SUBTOTAL</b></div>
                                        <div class="cart_item_text">{{ presentPrice($order->sub_total) }}kz</div>

                                    </div>

                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title"><b>TAX (14%)</b></div>
                                        <div class="cart_item_text"><span>{{ presentPrice($order->tax) }}kz</span></div>
                                    </div>
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title"><b>ENVIO</b></div>
                                        <div class="cart_item_text"><span
                                                style="width: 200px;">{{ presentPrice($order->freight_cost) }}kz</span>
                                        </div>
                                    </div>

                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title"><b>TOTAL</b></div>
                                        <div class="cart_item_text">
                                            <b>{{ presentPrice($order->total) }}kz</b>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
