@extends('layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_responsive.css') }}">
    <style type="text/css">
        table td {
            padding: 10px;
        }
    </style>
@endsection

@section('title', 'Pedido - ' . $order->id)

@section('content')
    <section id="order_details">
        <div class="container mt-4">
            <h3 class="text-center mb-4">Detalhes do Pedido #{{ $order->id }}</h3>

            <div class="row">
                <div class="col">
                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <!-- Resumo do Pedido -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Resumo do Pedido</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Referência do Pedido:</strong> {{ $order->payment->reference }}</p>
                            <p><strong>Estado do Pedido:</strong>
                                <span
                                    class="badge badge-{{ $order->status === 'Cancelado' ? 'danger' : ($order->status === 'Pago' ? 'success' : 'info') }}">
                                    {{ $order->status }}
                                </span>
                            </p>
                            <p><strong>Data do Pedido:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                            <p><strong>Forma de Envio:</strong> {{ $order->shipping_method }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <!-- Informações do Pagamento -->
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Informações do Pagamento</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Método de Pagamento:</strong> {{ $order->payment->method }}</p>
                            <p><strong>Status do Pagamento:</strong>
                                <span
                                    class="badge badge-{{ $order->payment->status === 'Cancelado' ? 'danger' : ($order->payment->status === 'Confirmado' ? 'success' : 'info') }}">
                                    {{ $order->payment->status }}
                                </span>
                            </p>
                            @if ($order->payment->receipt_image)
                                <p><strong>Comprovativo de Pagamento:</strong></p>
                                <!-- Botão para abrir o modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#viewReceiptModal">
                                    Visualizar Comprovativo
                                </button>

                                <!-- Incluindo o componente viewReceiptModal com a URL do arquivo -->
                                @include('orders.components.view-receipt-modal', [
                                    'url' => asset('images/receipts/' . $order->payment->receipt_image),
                                ])
                            @else
                                <p class="text-warning">Nenhum comprovativo enviado.</p>
                            @endif

                            @if ($order->payment->status === 'Pendente' || $order->payment->status === 'Aguardando Confirmação')
                                <button class="btn btn-primary" data-toggle="modal" data-target="#uploadReceiptModal">Enviar
                                    Recibo de Transferência
                                    {{ $order->payment->status === 'Aguardando Confirmação' ? 'Novamente' : '' }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <!-- Lista de Produtos -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Itens do Pedido</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Imagem</th>
                                    <th>Nome do Producto</th>
                                    <th>Quantidade</th>
                                    <th>Preço Unitário</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_products as $order_product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/products/' . $order_product->product->image) }}"
                                                alt="{{ $order_product->product->name }}" class="img-fluid"
                                                style="max-width: 80px;">
                                        </td>
                                        <td>{{ ucwords($order_product->product->name) }}</td>
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

            <!-- Totais do Pedido -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Totais</h5>
                </div>
                <div class="card-body">
                    <p><strong>Subtotal:</strong> {{ presentPrice($order->sub_total) }}kz</p>
                    <p><strong>Taxa (14%):</strong> {{ presentPrice($order->tax) }}kz</p>
                    <p><strong>Frete:</strong> {{ presentPrice($order->freight_cost) }}kz</p>
                    <h5><strong>Total:</strong> {{ presentPrice($order->total) }}kz</h5>
                </div>
            </div>

            @if ($order->status === 'Enviado' || $order->status === 'Entregue')
                <div class="card mb-4">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0">Informações de Transporte</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <!-- Partida -->
                            <div class="col-md-4">
                                <div>
                                    <i class="fas fa-truck text-danger" style="font-size: 24px;"></i>
                                    <h6 class="mt-2"><strong>Partida</strong></h6>
                                </div>
                                <p>{{ $order->sent_date ? \Carbon\Carbon::parse($order->sent_date)->format('d/m/Y') : 'Data não informada' }}
                                </p>
                                <p>Benguela - Armazém JM2X</p>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <i class="fas fa-clock text-danger" style="font-size: 24px;"></i>
                                    <h6 class="mt-2"><strong>Estimativa de Chegada</strong></h6>
                                </div>
                                <p>{{ $order->expected_date ? \Carbon\Carbon::parse($order->expected_date)->format('d/m/Y') : 'Data não informada' }}
                                <p>Código de Rastreio:</p>
                                @if ($order->tracking_code)
                                    <div class="d-inline-block bg-light p-2 rounded border">
                                        <code id="trackingCode">{{ $order->tracking_code }}</code>
                                        <button id="trackingCodeButton" class="btn btn-sm btn-outline-primary ml-2">
                                            Copiar
                                        </button>
                                    </div>
                                @else
                                    <p class="text-muted">não informado</p>
                                @endif
                            </div>
                            @if ($order->delivered_date)
                                <div class="col-md-4">
                                    <div>
                                        <i class="fas fa-home text-danger" style="font-size: 24px;"></i>
                                        <h6 class="mt-2"><strong>Entregue</strong></h6>
                                    </div>
                                    <p>{{ $order->delivered_date ? \Carbon\Carbon::parse($order->delivered_date)->format('d/m/Y') : 'Data não informada' }}
                                    <p>{{ $order->address ? $order->address->endereco : 'Não informado' }}</p>
                                    </p>
                                </div>
                            @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($order->status !== 'Cancelado' && $order->status !== 'Entregue')
                <div class="text-center">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#cancelOrderModal">Cancelar
                        Pedido</button>
                </div>
            @endif
        </div>
    </section>

    <!-- Modal para Enviar Recibo -->
    @include('orders.components.upload-receipt-modal', ['order' => $order]);
@endsection

@section('script')
    <script>
        $('#trackingCodeButton').on('click', () => {
            const codeElement = document.getElementById('trackingCode');
            const textToCopy = codeElement.textContent;

            navigator.clipboard.writeText(textToCopy)
                .then(() => {
                    $(this).html('Copiado!');
                })
                .catch(() => {
                    $(this).html('Falha ao copiar o código. Tente novamente.');
                });
        });
    </script>

@endsection
