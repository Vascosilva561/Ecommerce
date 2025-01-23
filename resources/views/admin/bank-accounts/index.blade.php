 @extends('admin.master')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
 @section('title', 'Contas Bancárias')
 @section('content')
     <div class="product-status mg-b-30">
         <div class="container-fluid" style="margin-top: 16px;">
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
                         <h4>Lista de Contas Bancárias</h4>
                         <div class="add-product">
                             <button type="button" data-toggle="modal" data-target="#myModal"
                                 class="navbar-right btn btn-primary">Nova
                                 Conta Bancária</button>
                             @include('admin.bank-accounts.editor')
                         </div>
                         <table>
                             <tr>
                                 <th>Nome</th>
                                 <th>Banco</th>
                                 <th>IBAN</th>
                                 <th>Acções</th>
                             </tr>

                             @foreach ($bank_accounts as $item)
                                 <tr>

                                     <td>{{ $item->name }}</td>
                                     <td>{{ $item->bank }}</td>
                                     <td>{{ $item->iban }}</td>

                                     <td>
                                         <button data-toggle="modal" data-target="#myModal{{ $item->id }}"
                                             title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o"
                                                 aria-hidden="true"></i></button>
                                         @include('admin.bank-accounts.editor', ['item' => $item])
                                         <form action="{{ route('admin.bank-accounts.destroy', ['item' => $item->id]) }}"
                                             method="POST">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="pd-setting-ed" data-toggle="tooltip"
                                                 title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                         </form>
                                     </td>

                                 </tr>
                             @endforeach


                         </table>
                         {{ $bank_accounts->appends(request()->input())->links() }}
                     </div>
                 </div>

             </div>
         </div>
     </div>

 @endsection
