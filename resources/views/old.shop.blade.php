<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">

    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">

</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar" style="background-color: #952825; color: white;">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('images/phone.png') }}" alt="">
                                    <b>+(244) 940 803 094</b>
                                </div>
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('images/mail.png') }}" alt=""> <a
                                        href="info@www.linkedin.com/in/vasco-silva-8a680918b"><b
                                            style="color: white">info@www.linkedin.com/in/vasco-silva-8a680918b</b></a>
                                </div>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_user">
                                    @guest
                                        <div class="user_icon"><img src="{{ asset('images/user.svg') }}" alt="">
                                        </div>
                                        <div><a href="{{ route('register') }}" style="color: white">Registrar</a></div>
                                        <div><a href="{{ route('login') }}" style="color: white">Entrar</a></div>
                                    @else
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="#"><img
                                            src="{{ asset('images/icons/logo-shopp.png') }}"
                                            style="width: 200px; margin-top: 65px;"></a></div>
                            </div>
                        </div>
                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <input type="search" required="required" class="header_search_input"
                                                placeholder="Procurar productos">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">Todas
                                                        Categorias</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <?php $categories = DB::table('categories')->get(); ?>
                                                        @foreach ($categories as $category)
                                                            <li><a class="clc" href="#">{{ $category->name }}
                                                                    <i class="fas fa-chevron-right ml-auto"></i></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300" value="Submit"
                                                style="background-color: #952825;"><img
                                                    src="{{ asset('images/icons/pesquisarB.png') }}" alt=""
                                                    style="width: 30px;"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img src="{{ asset('images/heart.png') }}"
                                            alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="#">Pedidos</a></div>
                                        <div class="wishlist_count">115</div>
                                    </div>
                                </div>

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <a href="{{ route('cart.index') }}">
                                                <img src="{{ asset('images/cart.png') }}" alt="">
                                                @if (Cart::instance('default')->count() > 0)
                                                    <div class="cart_count">
                                                        <span>{{ Cart::instance('default')->count() }}</span>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{ route('cart.index') }}">Carrinho</a>
                                            </div>
                                            @if (Cart::instance('default')->count() > 0)
                                                <div class="cart_price" style="color: red;">
                                                    {{ presentPrice(Cart::total()) }}.00Kz</div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="main_nav_content d-flex flex-row">

                                <div class="cat_menu_container" style="background-color: #952825;">
                                    <div
                                        class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                        <div class="cat_burger"><span></span><span></span><span></span></div>
                                        <div class="cat_menu_text">Categorias</div>
                                    </div>

                                    <ul class="cat_menu">
                                        <?php $categories = DB::table('categories')->get(); ?>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a class="clc"
                                                    href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ ucwords($category->name) }}
                                                    <i class="fas fa-chevron-right ml-auto"></i>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Main Nav Menu -->


                                <div class="main_nav_menu ml-auto">
                                    <ul class="standard_dropdown main_nav_dropdown">
                                        <li><a href="{{ route('home') }}" style="color: #952825;"
                                                class="efect">Inicio<i class="fas fa-chevron-down"></i></a></li>

                                        <li><a href="{{ route('shop.index') }}" style="color: #952825;"
                                                class="efect">Productos<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{ route('checkout.index') }}" style="color: #952825;"
                                                class="efect">Checkout<i class="fas fa-chevron-down"></i></a></li>

                                        <?php if(Auth::check()){ ?>
                                        <li class="hassubs">
                                            <a href="#">{{ Auth::user()->name }}<i
                                                    class="fas fa-chevron-down"></i></a>
                                            <ul>

                                                <li><a href="{{ url('/') }}/profile" style="color: #952825;"
                                                        class="efect">Perfil<i class="fas fa-chevron-down"></i></a>
                                                </li>
                                                <li><a href="{{ route('logout') }}" style="color: #952825;"
                                                        class="efect">Desconectar<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <?php }else{ ?>
                                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}"
                                                style="color: #952825;" class="efect">Entrar</a></li>
                                        <?php }?>
                                        <li><a href="contact.html" style="color: #952825;" class="efect">Contactos<i
                                                    class="fas fa-chevron-down"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll"
                data-image-src="images/shop_background.jpg"></div>
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
                                        Preços Baixo </a> ||
                                    <a
                                        href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">Preços
                                        Alto </a>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">Ordem<i class="fas fa-chevron-down"></span></i>
                                            <ul>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "name" }'>Nome</li>
                                                <li
                                                    class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>
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
                                                    <input type="hidden" name="id"
                                                        value="{{ $product->id }}">
                                                    <input type="hidden" name="name"
                                                        value="{{ $product->name }}">
                                                    <input type="hidden" name="price"
                                                        value="{{ $product->price }}">


                                                    <button type="submit" class="btn btn-lg btn-outline-secondary"
                                                        style="background-color: #a12421; color: white; font-size:16px;">Add
                                                        no carrinho</button>
                                                </div>
                                            </div>

                                        </form>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>

                                    </div>
                                @empty
                                    <div> Não exite nada </div>
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
                                            src="{{ asset('images/icons/logo-shopp.png') }}"
                                            style="width: 150px;"></a></div>
                            </div>
                            <div class="footer_title">Tem alguma pergunta? Ligue para nós</div>
                            <div class="footer_phone" style="color: #a12421;"> +244 940 803 094</div>

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
                            <div class="footer_title">Serviço de atendimento ao Consumidor</div>
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
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>

    <script src="{{ asset('plugins/easing/easing.js') }}"></script>



    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/shop_custom.js"></script>
</body>

</html>
