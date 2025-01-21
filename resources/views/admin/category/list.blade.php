 @extends('admin.master')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
 @section('title', 'jfkj')
 @section('content')
     <div class="breadcome-area">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="breadcome-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                 <div class="breadcomb-wp">
                                     <div class="breadcomb-icon">
                                         <i class="icon nalika-home"></i>
                                     </div>
                                     <div class="breadcomb-ctn">
                                         <h2>categorias</h2>

                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                 <div class="breadcomb-report">
                                     <button data-toggle="tooltip" data-placement="left" title="Download Report"
                                         class="btn"><i class="icon nalika-download"></i></button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>



     <div class="product-status mg-b-30">
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
                         <h4>Lista de Categorias</h4>
                         <div class="add-product">
                             <button type="button" data-toggle="modal" data-target="#myModal" class="navbar-right">Nova
                                 Categoria</button>
                             @include('admin.category.editor')
                         </div>
                         <table style="margin-top: -200px;">
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
                                         <button data-toggle="modal" data-target="#myModal{{ $category->id }}"
                                             title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o"
                                                 aria-hidden="true"></i></button>
                                         <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                             method="POST">
                                             @csrf
                                             <button type="submit" class="pd-setting-ed" data-toggle="tooltip"
                                                 title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                         </form>
                                     </td>

                                 </tr>
                                 @include('admin.category.editor', ['item' => $category])
                             @endforeach


                         </table>
                         <div class="custom-pagination">
                             <ul class="pagination">
                                 <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                                 <li class="page-item"><a class="page-link" href="#">1</a></li>
                                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                                 <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>

 @endsection
