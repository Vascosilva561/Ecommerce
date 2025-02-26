@extends('admin.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
@endsection
@section('title', 'Pagamentos')
@section('content')
    <div class="product-status mg-b-30" style="margin-top: 16px">
        <div class="container-fluid">
            <div class="row">
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


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Lista de Pagamentos</h4>
                        <div class="add-product">
                            <a type="button" href="{{ route('admin.payments.export') }}"
                                class="navbar-right btn btn-primary"><i class="icon nalika-download"></i>
                                Exportar</a>
                            {{-- @include('admin.payments.editor') --}}
                        </div>
                        <table>
                            <tr>
                                <th>Transação</th>
                                <th>Código de Pedido</th>
                                <th>Método</th>
                                <th>Referência</th>
                                <th>Data</th>
                                <th>Total</th>
                                <th>Status do Pedido</th>
                                <th>Acções</th>
                            </tr>

                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->transaction_id }}</td>
                                    <td>{{ $payment->order_id }}</td>
                                    <td>{{ $payment->method }}</td>
                                    <td>{{ $payment->reference }}</td>
                                    <td>{{ $payment->created_at }}</td>
                                    <td>{{ presentPrice($payment->order->total) }}kz</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>
                                        <div class="d-flex flex-nowrap">
                                            <button data-toggle="modal" data-target="#myModal{{ $payment->id }}"
                                                title="Edit" class="pd-setting-ed btn btn-primary mr-2 flex-1"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></button>
                                            @include('admin.payments.view', ['item' => $payment])
                                        </div>
                                    </td>

                                </tr>
                            @endforeach


                        </table>
                        {{ $payments->appends(request()->input())->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
