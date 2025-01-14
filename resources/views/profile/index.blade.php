@extends('layouts.master')

@section('title', 'Perfil')

@section('content')
    <style type="text/css">
        table td {
            padding: 10px;
        }
    </style>

    <section id="cart_items">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-4 well well-sm">
                    <div class="card border-secondary mb-3" style="max-width: 18rem ">
                        <div class="card-header"> Menu Perfil </div>
                        <div class="card-body text-secondary">
                            <nav class="nav flex-column">
                                <a class="nav-link" href="{{ '/profile' }}">Meu Perfil</a>
                                <a class="nav-link" href="{{ '/orders' }}">Meus Pedidos</a>
                                <a class="nav-link" href="{{ '/profile/address' }}">Meu Endereço</a>
                                <a class="nav-link" href="{{ '/password' }}">Mudar Senha</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li>
                            <h3>Bem-Vindo <span style="color: green">{{ ucwords(Auth::user()->name) }}</span></h3>
                        </li>
                        <table border="0" align="center">
                            <tr>
                                <td><a href="{{ url('/') }}/orders" class="btn btn-success">Meus Pedidos</a></td>
                                <td><a href="{{ url('/profile/address') }}" class="btn btn-success">Meu Endereço</a></td>
                                <td><a href="{{ url('/password') }}/orders" class="btn btn-success">Mudar Senha</a></td>
                            </tr>
                        </table>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection
