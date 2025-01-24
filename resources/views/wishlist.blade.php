@extends('layouts.shop')

@section('content')

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">


                <div class="col-lg-12">
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

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- Shop Content -->

                    <div class="shop_content">
                        <h3 style="text-align: center;">Lista de Desejos</h3><br>


                        <?php
					if ($products->isEmpty()) {?>

                        <h4 style="text-align: center;">Desculpe! Nenhum Producto Encontrado</h4>
                        <?php }else{ ?>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>



                            @foreach ($products as $product)
                                @if (isset($product->id))
                                    <div class="product_item is_new">
                                        <div class="product_border"></div>
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{ route('shop.show', ['product' => $product->id]) }}"
                                                tabindex="0"><img src="{{ asset('images/products/' . $product->image) }}"
                                                    style="width: 150px; height: 150px;" alt=""></a>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_price">{{ $product->price }}kz</div>
                                            <div class="product_name">
                                                <div><a href="{{ route('shop.show', $product->id) }}" tabindex="0"
                                                        style="color: #a12421; font-size: 11px;"><b>{{ $product->name }}</b></a>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            {{ csrf_field() }}
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">


                                                    <button type="submit" class="btn btn-lg btn-outline-secondary"
                                                        style="background-color: #a12421; color: white; font-size:16px;">Add
                                                        ao
                                                        carrinho</button>

                                                </div>
                                            </div>

                                        </form>
                                        <form action="{{ route('removeWishlist', ['id' => $product->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" style="color: red;"
                                                class="btn btn-default btn-block">Remover
                                                da
                                                Lista</button>
                                        </form>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>

                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <?php } ?>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i
                                    class="fas fa-chevron-left"></i></div>
                            <ul class="page_nav d-flex flex-row">
                                {{-- {{ $products->links() }} --}}
                                {{-- {{ $products->appends(request()->input())->links() }} --}}
                            </ul>
                            <div class="page_next d-flex flex-column align-items-center justify-content-center"><i
                                    class="fas fa-chevron-right"></i></div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
