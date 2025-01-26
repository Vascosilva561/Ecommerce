 @extends('admin.master')
 @section('style')
     <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
 @endsection
 @section('title', 'Pedidos')
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
                         <h4>Lista de Pedidos</h4>
                         <div class="add-product">
                             <a type="button" href="{{ route('admin.orders.export') }}"
                                 class="navbar-right btn btn-primary"><i class="icon nalika-download"></i>
                                 Exportar</a>
                             {{-- @include('admin.orders.editor') --}}
                         </div>
                         <table>
                             <tr>
                                 <th>Código de Pedido</th>
                                 <th>Nome do Cliente</th>
                                 <th>Email do Cliente</th>
                                 <th>Contato do Cliente</th>
                                 <th>Data</th>
                                 <th>Total</th>
                                 <th>Status do Pedido</th>
                                 <th>Acções</th>
                             </tr>

                             @foreach ($orders as $order)
                                 <tr>
                                     <td>{{ $order->id }}</td>
                                     <td>{{ $order->address->name }}</td>
                                     <td>{{ $order->address->email }}</td>
                                     <td>{{ $order->address->telefone }}</td>
                                     <td>{{ $order->created_at }}</td>
                                     <td>{{ presentPrice($order->total) }}kz</td>
                                     <td>{{ $order->status }}</td>
                                     <td>
                                         <div class="d-flex flex-nowrap">
                                             <button data-toggle="modal" data-target="#myModal{{ $order->id }}"
                                                 title="Edit" class="pd-setting-ed btn btn-primary mr-2 flex-1"><i
                                                     class="fa fa-eye" aria-hidden="true"></i></button>
                                             @include('admin.orders.view', ['item' => $order])
                                         </div>
                                     </td>

                                 </tr>
                             @endforeach


                         </table>
                         {{ $orders->appends(request()->input())->links() }}
                     </div>
                 </div>

             </div>
         </div>
     </div>

 @endsection
