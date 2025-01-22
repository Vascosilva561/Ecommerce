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
                        <h4>Lista de Fornecedores</h4>
                        <div class="add-product">
                            <button type="button" data-toggle="modal" data-target="#myModal"
                                class="navbar-right btn btn-primary d-none"><i class="icon nalika-download"></i>
                                Exportar</button>
                            {{-- @include('admin.suppliers.editor') --}}
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

                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->transaction_id }}</td>
                                    <td>{{ $supplier->order_id }}</td>
                                    <td>{{ $supplier->method }}</td>
                                    <td>{{ $supplier->reference }}</td>
                                    <td>{{ $supplier->created_at }}</td>
                                    <td>{{ presentPrice($supplier->order->total) }}kz</td>
                                    <td>{{ $supplier->status }}</td>
                                    <td>
                                        <div class="d-flex flex-nowrap">
                                            <button data-toggle="modal" data-target="#myModal{{ $supplier->id }}"
                                                title="Edit" class="pd-setting-ed btn btn-primary mr-2 flex-1"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></button>
                                        </div>
                                    </td>

                                </tr>
                                @include('admin.suppliers.view', ['item' => $supplier])
                            @endforeach


                        </table>
                        {{ $suppliers->appends(request()->input())->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
