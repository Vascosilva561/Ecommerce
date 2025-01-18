@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
@section('title', '$product->name')
@section('content')


    <!-- Single Product -->

    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        @foreach ($imagens as $image)
                            <li data-image="{{ asset('images/product/' . $image->img) }}"><img
                                    src="{{ asset('images/product/' . $image->img) }}" alt=""></li>
                        @endforeach
                    </ul>
                </div>

                @foreach ($products as $product)
                    <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected"><img src="{{ asset('images/product/' . $product->image) }}"
                                alt=""></div>
                    </div>

                    <!-- Description -->
                    <div class="col-lg-5 order-3">
                        <div class="product_description">
                            <div class="product_category">Detalhes do Productos</div>
                            <div class="product_name">{{ $product->name }}</div>
                            <div class="product_name">
                                <h5>{{ $product->details }}</h5>
                            </div>


                            <div class="product_text">
                                <p>
                                <h4>Informações</h4>
                                </p>
                            </div>
                            <div class="product_text">
                                <p style="font-size: 16px;">{{ $product->description }}</p>
                            </div>
                            <div class="order_info d-flex flex-row">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    <div class="button_container">

                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <button type="submit" class="btn btn-primary" style="margin-top: -45px;">Add
                                            carrinho</button>



                                    </div>

                                </form>


                                <?php

								$wishlistData =DB::table('wishlists')
								->rightJoin('products','wishlists.prod_id','=','products.id')
								->where('wishlists.prod_id','=',$product->id)->get();




								$count=App\Wishlist_model::where(['prod_id'=>$product->id])->count();

								if ($count=="0"){ ?>

                                <form action="{{ route('addToWishlist') }}" method="post" role="form">
                                    {{-- {{csrf_token()}} --}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" value="{{ $product->id }}" name="prod_id">
                                    <button type="submit" class="btn btn-danger"
                                        style="margin-top: -2px; background-color: #ad2d29; margin-left: 40px; color: white;">
                                        Adicionar a Lista de Desejos</button>

                                </form>
                                <?php }else{?>

                                <form action="{{ route('removeWishlist', ['id' => $product->id]) }}" method="post"
                                    role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-outline-danger"
                                        style="margin-top: -2px; margin-left: 40px;">
                                        Remover da Lista de Desejos</button>
                                </form>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Recently Viewed -->

    @include('relacionados')



    <script src="{{ asset('js/product_custom.js') }}"></script>


@endsection
