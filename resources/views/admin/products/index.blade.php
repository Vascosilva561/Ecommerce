 @extends('admin.master')
 @section('style')
     <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
 @endsection
 @section('title', 'Productos')
 @section('content')
     <div class="product-status mg-b-30" style="margin-top: 16px;">
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
                         <h4>Lista de Productos</h4>
                         <div class="add-product">
                             <button type="button" data-toggle="modal" data-target="#myModal"
                                 class="navbar-right btn btn-primary">Adicionar
                                 Producto </button>
                             @include('admin.products.editor', [
                                 'categories' => $categories,
                                 'item' => null,
                             ])

                         </div>

                         <table style="margin-top: -200px;">
                             <tr>
                                 <th>Image</th>
                                 <th>Producto</th>
                                 <th>Status</th>
                                 <th>Indentificador</th>
                                 <th>Preço</th>
                                 <th>Stock</th>
                                 <th>Detalhes</th>
                                 <th>Acções</th>
                             </tr>

                             @foreach ($products as $product)
                                 <tr style="color:black;">

                                     <td><img src="{{ asset('images/products/' . $product->image) }}" alt="" /></td>
                                     <td>{{ $product->name }}</td>
                                     <td>
                                         <button class="pd-setting">Active</button>
                                     </td>
                                     <td>{{ $product->slug }}</td>
                                     <td>{{ $product->price }},00kz</td>
                                     <td>{{ $product->stock }} Unt</td>
                                     <td>{{ $product->details }} </td>


                                     <td>
                                         <div class="d-flex">
                                             <button href="#myModal{{ $product->id }}" data-toggle="modal"
                                                 data-target="#myModal{{ $product->id }}" title="Edit"
                                                 class="pd-setting-ed btn btn-warning"><i class="fa fa-pencil-square-o"
                                                     aria-hidden="true"></i></button>
                                             <button type="submit" form="deleteForm{{ $product->id }}"
                                                 class="pd-setting-ed btn btn-danger" data-toggle="tooltip"
                                                 title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                             <form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}"
                                                 method="POST" id="deleteForm{{ $product->id }}" class="hidden">
                                                 @csrf
                                                 @method('DELETE')
                                             </form>
                                         </div>
                                     </td>

                                 </tr>
                                 @include('admin.products.editor', [
                                     'item' => $product,
                                     'categories' => $categories,
                                 ])
                             @endforeach


                         </table>
                         {{ $products->appends(request()->input())->links() }}
                     </div>
                 </div>
             </div>
         </div>
     </div>

 @endsection
