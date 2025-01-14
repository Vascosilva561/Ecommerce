@extends('layouts.master')

@section('title', 'Mudar Senha')

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
                <div class="col-md-3 well well-sm">
                    <div class="card border-secondary mb-3" style="max-width: 18rem ">
                        <div class="card-header"> |Mudsar Senha </div>
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
                <div class="col-md-9">
                    <h3><span style="color: green;">{{ ucwords(Auth::user()->name) }}</span>, Seu Endereço</h3>
                    <div class="container">
                        @if (session('msg'))
                            <div class="alert alert-info">{{ session('msg') }}</div>
                        @endif
                        <form action="{{ url('updatePassword') }}" method="post" role="form" multpart="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
                                <label for="oldPassword">Senha Actual</label>
                                <input type="text" class="form-control" name="oldPassword" id="oldPassword"
                                    placeholder="">
                                <span class="text-danger">{{ $errors->first('oldPassword') }}</span>
                            </div>


                            <div class="form-group {{ $errors->has('newPassword') ? 'has-error' : '' }}">
                                <label for="newPassword">Nova Senha</label>
                                <input type="text" class="form-control" name="newPassword" id="newPassword"
                                    placeholder="">
                                <span class="text-danger">{{ $errors->first('newPassword') }}</span>
                            </div>

                            <button type="submit" class="btn btn-primary"> Actualizar </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
