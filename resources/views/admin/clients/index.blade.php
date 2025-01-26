@extends('admin.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
@endsection
@section('title', 'Clientes')
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
                        <h4>Lista de Clientes</h4>
                        <div class="add-product">
                            {{-- <button type="button" data-toggle="modal" data-target="#myModal"
                                class="navbar-right btn btn-primary d-none">Novo Fornecedor</button>
                            @include('admin.clients.editor', ['categories' => $categories]) --}}
                        </div>
                        <table>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Contacto</th>
                                <th>Endereço</th>
                                <th>Município</th>
                                <th>Província</th>
                                <th>Acções</th>
                            </tr>

                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ isset($client->address) ? $client->address->telefone : 'N/A' }}</td>
                                    <td>{{ isset($client->address) ? $client->address->endereco : 'N/A' }}</td>
                                    <td>{{ isset($client->address) ? $client->address->municipio : 'N/A' }}</td>
                                    <td>{{ isset($client->address) ? $client->address->provincia : 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            {{-- <button href="#myModal{{ $client->id }}" data-toggle="modal"
                                                data-target="#myModal{{ $client->id }}" title="Edit"
                                                class="pd-setting-ed btn btn-warning"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></button>
                                            <button type="submit" form="deleteForm{{ $client->id }}"
                                                class="pd-setting-ed btn btn-danger" data-toggle="tooltip" title="Trash"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            <form action="{{ route('admin.clients.destroy', ['id' => $client->id]) }}"
                                                method="POST" id="deleteForm{{ $client->id }}" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form> --}}
                                        </div>
                                    </td>

                                </tr>
                                {{-- @include('admin.clients.editor', [
                                    'item' => $client,
                                    'categories' => $categories,
                                ]) --}}
                            @endforeach


                        </table>
                        {{ $clients->appends(request()->input())->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
