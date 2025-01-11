@extends('layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
@endsection

@section('title', 'Pedidos')

@section('content')
    <style type="text/css">
        table td {
            padding: 10px;
        }
    </style>

    <section id="cart_items">
        <div class="container">
            <br>
            <h3 style="text-align: center; text-decoration: underline; margin-top: 40px;">
                <center>Lista de Pedidos</center>
            </h3><br>

            <div class="row">

                <div class="col-md-12">
                    <h3><span style="color: green;">{{ ucwords(Auth::user()->name) }}</span>, Seus Pedidos</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Nome do Producto</th>
                                    <th>Codigo do Producto</th>
                                    <th>Quantidade</th>
                                    <th>Preco Unit</th>

                                    <th>Status do Pedido</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ ucwords($order->name) }}</td>
                                        <td>{{ $order->referens }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->price }}</td>

                                        <td class="btn btn-primary" style="background-color: #4bbeee;">{{ $order->status }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
