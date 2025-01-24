@extends('layouts.shop')

@section('content')

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg">
        </div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{ $categoryName }}</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categorias</div>
                            <ul class="sidebar_categories">
                                <li><a href="{{ route('shop.index') }}">TODOS</a></li>
                                @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filtrar Por:</div>
                            <div class="sidebar_subtitle">Preço</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Faixa de Preço: </p>
                                <?php $max = DB::table('products')->max('price'); ?>
                                <?php $min = DB::table('products')->min('price'); ?>
                                <p><input type="text" id="amount" class="amount" data-max-value="{{ $max }}"
                                        data-min-value="{{ $min }}" readonly style="border:0; font-weight:bold;">
                                </p>
                            </div>
                        </div>
                        {{-- <div class="sidebar_section">
                            <div class="sidebar_subtitle color_subtitle">Cor</div>
                            <ul class="colors_list">
                                <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                                <li class="color"><a href="#" style="background: #000000;"></a></li>
                                <li class="color"><a href="#" style="background: #999999;"></a></li>
                                <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                                <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                                <li class="color"><a href="#"
                                        style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                            </ul>
                        </div> --}}

                    </div>

                </div>

                <div class="col-lg-10">
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
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span style="color: #a12421;"> {{ $total_counts }} </span> -
                                Productos Encontrado</div>
                            <div class="shop_sorting">
                                <span>Filtrar Por:</span>
                                <a
                                    href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_high']) }}">
                                    Menor Preço </a> ||
                                <a
                                    href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">
                                    Maior Preço </a>
                                <ul>
                                    <li>
                                        <span class="sorting_text">Ordem<i class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Nome
                                            </li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>Preço
                                            </li>
                                            <li class="shop_sorting_button"
                                                data-isotope-option='{ "sortBy": "original-order" }'>Destaque</li>

                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>



                            @forelse ($products as $product)
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <a href="{{ route('shop.show', $product->id) }}" tabindex="0"><img
                                                src="{{ asset('images/products/' . $product->image) }}"
                                                style="width: 150px; height: 150px;" alt=""></a>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_price">{{ $product->presentPrice() }}kz</div>
                                        <div class="product_name">
                                            <div><a href="{{ route('shop.show', $product->id) }}" tabindex="0"
                                                    style="color: #a12421; font-size: 12px;"><b>{{ $product->name }}</b></a>
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
                                                    style="background-color: #a12421; color: white; font-size:16px;">Add no
                                                    carrinho</button>
                                            </div>
                                        </div>

                                    </form>
                                    <?php

								$wishlistData =DB::table('wishlists')
								->rightJoin('products','wishlists.prod_id','=','products.id')
								->where('wishlists.prod_id','=',$product->id)->get();




								$count=App\Wishlist::where(['prod_id'=>$product->id])->count();

								if ($count=="0"){ ?>

                                    <form action="{{ route('addToWishlist') }}" method="post" role="form">
                                        {{-- {{csrf_token()}} --}}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" value="{{ $product->id }}" name="prod_id">
                                        <button type="submit" class="btn btn-link product_fav" style="padding: 0%; "><i class="fas fa-heart"></i></button>

                                    </form>
                                    <?php }else{?>

                                    <form action="{{ route('removeWishlist', ['id' => $product->id]) }}" method="post"
                                        role="form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-link product_fav active" style="padding: 0%; "><i class="fas fa-heart"></i></button>
                                    </form>
                                    <?php }?>


                                </div>
                            @empty
                                <div> Nao exite nada </div>
                            @endforelse

                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i
                                    class="fas fa-chevron-left"></i></div>
                            <ul class="page_nav d-flex flex-row">
                                {{-- {{ $products->links() }} --}}
                                {{ $products->appends(request()->input())->links() }}
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
