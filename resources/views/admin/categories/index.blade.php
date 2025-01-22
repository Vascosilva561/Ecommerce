 @extends('admin.master')

 @section('style')
     <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
 @endsection
 @section('title', 'Categorias')
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
                         <h4>Lista de Categorias</h4>
                         <div class="add-product">
                             <button type="button" data-toggle="modal" data-target="#myModal"
                                 class="navbar-right btn btn-primary">Nova
                                 Categoria</button>
                             @include('admin.categories.editor')
                         </div>
                         <table>
                             <tr>
                                 <th>Image</th>
                                 <th>Categoria</th>
                                 <th>Acções</th>
                             </tr>

                             @foreach ($categories as $category)
                                 <tr>

                                     <td><img src="{{ asset('images/categories/' . $category->image) }}" alt="" />
                                     </td>
                                     <td>{{ $category->name }}</td>

                                     <td>
                                         <div class="d-flex flex-nowrap">
                                             <button data-toggle="modal" data-target="#myModal{{ $category->id }}"
                                                 title="Edit" class="pd-setting-ed btn btn-warning mr-2 flex-1"><i
                                                     class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                             <button type="submit" form="deleteForm{{ $category->id }}"
                                                 class="pd-setting-ed btn btn-danger" data-toggle="tooltip"
                                                 title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                             <form
                                                 action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}"
                                                 method="POST" id="deleteForm{{ $category->id }}" class="hidden">
                                                 @csrf
                                                 @method('DELETE')
                                             </form>
                                         </div>
                                     </td>

                                 </tr>
                                 @include('admin.categories.editor', ['item' => $category])
                             @endforeach


                         </table>
                         {{ $categories->appends(request()->input())->links() }}
                     </div>
                 </div>

             </div>
         </div>
     </div>

 @endsection
