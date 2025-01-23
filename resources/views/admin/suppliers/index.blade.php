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
                                class="navbar-right btn btn-primary d-none">Novo Fornecedor</button>
                            @include('admin.suppliers.editor', ['categories' => $categories])
                        </div>
                        <table>
                            <tr>
                                <th>Empresa</th>
                                <th>Email</th>
                                <th>Contacto</th>
                                <th>NIF</th>
                                <th>Localização</th>
                                <th>Acções</th>
                            </tr>

                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->nif }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button href="#myModal{{ $supplier->id }}" data-toggle="modal"
                                                data-target="#myModal{{ $supplier->id }}" title="Edit"
                                                class="pd-setting-ed btn btn-warning"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></button>
                                            <button type="submit" form="deleteForm{{ $supplier->id }}"
                                                class="pd-setting-ed btn btn-danger" data-toggle="tooltip" title="Trash"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            <form action="{{ route('admin.suppliers.destroy', ['id' => $supplier->id]) }}"
                                                method="POST" id="deleteForm{{ $supplier->id }}" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                @include('admin.suppliers.editor', [
                                    'item' => $supplier,
                                    'categories' => $categories,
                                ])
                            @endforeach


                        </table>
                        {{ $suppliers->appends(request()->input())->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
