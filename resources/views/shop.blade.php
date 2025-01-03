@extends('layouts.main')

@section('content')
    <div class="super_container">
        <!-- Home -->

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
                                <div class="sidebar_title">Categories</div>
                                <ul class="sidebar_categories">
                                    <li><a href="{{ route('shop.index') }}">DESTAQUES</a></li>
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
                                    <p>Alcance: </p>
                                    <p><input type="text" id="amount" class="amount" readonly
                                            style="border:0; font-weight:bold;"></p>
                                </div>
                            </div>
                            <div class="sidebar_section">
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
                            </div>

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
                                <div class="shop_product_count"><span style="color: #a12421;"> {{ $total_counts }}
                                    </span> - Productos Encontrado</div>
                                <div class="shop_sorting">
                                    <span>Liltrar Por:</span>
                                    <a
                                        href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_high']) }}">
                                        Preços Baixio </a> ||
                                    <a
                                        href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">Preços
                                        Alto </a>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">Ordem<i class="fas fa-chevron-down"></span></i>
                                            <ul>
                                                <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>
                                                    Nome</li>
                                                <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>
                                                    Preço</li>
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
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{ route('shop.show', $product->id) }}" tabindex="0"><img
                                                    src="{{ asset('images/product/' . $product->image) }}"
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
                                                        style="background-color: #a12421; color: white; font-size:16px;">Add
                                                        no carrinho</button>
                                                </div>
                                            </div>

                                        </form>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>

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

        {{-- @include('relacionados') --}}

        <!-- Brands -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div
                            class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                            <div class="newsletter_title_container">
                                <div class="newsletter_icon"><img src="images/icons/mensagens.png" alt="">
                                </div>
                                <div class="newsletter_title">Inscreva-se no boletim Informativo</div>
                                <div class="newsletter_text">
                                    <p>... e receba cupom de 20% para a primeira compra</p>
                                </div>
                            </div>
                            <div class="newsletter_content clearfix">
                                <form action="#" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required"
                                        placeholder="Insira o seu endereço de email">
                                    <button class="newsletter_button" style="background-color: #a12421;">Se
                                        Inscrever</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 footer_col">
                        <div class="footer_column footer_contact">
                            <div class="logo_container">
                                <div class="logo"><a href="#"><img
                                            src="{{ asset('images/icons/logo-shopp.png') }}" style="width: 150px;"></a>
                                </div>
                            </div>
                            <div class="footer_title">Tem alguma pergunta? Ligue para nós</div>
                            <div class="footer_phone" style="color: #a12421;"> +244 997 602 038</div>

                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Encontre rapidamente</div>
                            <ul class="footer_list">
                                @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-2">

                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Servico de atendimento ao Consumidor</div>
                            <ul class="footer_list">
                                <li><a href="#">Minha Conta</a></li>
                                <li><a href="#">Rastreamento de pedido</a></li>
                                <li><a href="#">Lista de Desejos</a></li>
                                <li><a href="#">Atendimento ao cliente</a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Copyright -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div
                            class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="js/shop_custom.js"></script>
@endsection
