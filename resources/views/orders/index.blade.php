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
            <h3 style="text-align: center; text-decoration: margin-top: 40px;">
                <center>Lista de Pedidos</center>
            </h3><br>

            <div class="row">

                <div class="col-md-12">
                    <h3><span style="color: black;">{{ ucwords(Auth::user()->name) }}</span>, Seus Pedidos</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Código do Pedido</th>
                                    <th>Código de Referência</th>
                                    <th>Total</th>

                                    <th>Status do Pedido</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->payment->reference }}</td>
                                        <td>{{ presentPrice($order->total) }}kz</td>

                                        <td>
                                            @switch($order->status)
                                                @case('Pagamento Aprovado')
                                                    <span class="badge badge-success px-3 py-2 mb-3">{{ $order->status }}</span>
                                                @break

                                                @case('Cancelado')
                                                    <span class="badge badge-danger px-3 py-2 mb-3">{{ $order->status }}</span>
                                                @break

                                                @case('Pendente')
                                                    <span class="badge badge-warning px-3 py-2 mb-3">{{ $order->status }}</span>
                                                @break

                                                @case('Entregue')
                                                    <span class="badge badge-success px-3 py-2 mb-3">{{ $order->status }}</span>
                                                @break

                                                @default
                                                    <span class="badge badge-info px-3 py-2 mb-3">{{ $order->status }}</span>
                                            @endswitch

                                            <br>
                                            <a href="{{ route('orders.show', $order->id) }}"
                                                class="btn btn-link link-danger btn-sm">Ver
                                                informações do Pedido <i class="fas fa-arrow-right"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="d-flex flex-row ml-auto my-4">
                    {{ $orders->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
