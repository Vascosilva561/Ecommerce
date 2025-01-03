<!DOCTYPE html>
<html lang="Pt-pt">

<head>
    <title>Okulandisa-Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Okulandisa E-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
    @yield('style')

</head>

<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header">

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row justify-content-between">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="/"><img
                                            src="{{ asset('images/icons/logo-shopp.png') }}" style="width: 200px;"></a>
                                </div>
                            </div>
                        </div>
                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <input type="search" required="required" class="header_search_input"
                                                placeholder="Procurar produtos">
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

                        <div class="top_bar_user order-4 my-auto">
                            @guest
                                <div class="user_icon"><img src="{{ asset('images/user.svg') }}" alt=""></div>
                                <div><a href="{{ route('register') }}">Registrar</a></div>
                                <div><a href="{{ route('login') }}">Entrar</a></div>
                            @else
                                <div>
                                    <a class="btn btn-danger text-white fw-bold d-flex align-items-center gap-2 py-0 px-3"
                                        style="background-color: #952825;" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <span class="mr-2">

                                            {{ __('Logout') }}
                                        </span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 23" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.3386 22.9051C2.5133 22.9348 0.164027 20.7373 0.00581243 17.9162L0 17.6781V5.23529C0.0216222 2.40905 2.26755 0.102676 5.09204 0.00595734L5.33779 0.000377405H10.906C13.7333 -0.0331022 16.0857 2.16493 16.2446 4.98791L16.2503 6.2778C16.2369 6.86928 15.7746 7.35287 15.1844 7.3924C14.5942 7.43192 14.0713 7.01482 13.979 6.43032L13.9704 6.29687V5.23622C13.9551 3.63106 12.6899 2.31745 11.0869 2.24119L10.8965 2.23561H5.34163C3.73612 2.22073 2.39635 3.45761 2.28359 5.05905L2.2837 5.24459V17.673C2.2994 19.2767 3.56337 20.5894 5.16528 20.6661L5.35581 20.6717H10.9211C12.5208 20.688 13.8563 19.4553 13.9684 17.8594L13.9741 16.63C13.9879 16.0385 14.4504 15.5558 15.0405 15.5163C15.6306 15.4768 16.1532 15.8944 16.2454 16.4784L16.254 16.6118V17.6841C16.2303 20.5006 13.9934 22.7995 11.1782 22.9004L10.9268 22.9065L5.3386 22.9051ZM18.7071 15.5C18.3114 15.1099 18.2658 14.4873 18.6004 14.0437L18.6956 13.9344L20.0927 12.5687H9.11821C8.5215 12.5831 8.01896 12.1256 7.97734 11.5304C7.93584 10.9352 8.37003 10.4125 8.96301 10.3442L9.09914 10.3335H20.0946L18.7109 8.98407C18.313 8.5972 18.2649 7.97457 18.5985 7.5305L18.6937 7.4203C19.0977 7.02087 19.7295 6.96739 20.1946 7.29382L20.307 7.38914L23.6496 10.6469C23.874 10.8552 24.0011 11.1472 24 11.4532C23.9983 11.7615 23.8686 12.0554 23.6421 12.2651L20.3233 15.5028C19.8735 15.9376 19.1598 15.9376 18.71 15.5028L18.7071 15.5Z"
                                                fill="white" />
                                        </svg>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endguest
                        </div>

                        <!-- Wishlist -->
                        {{-- <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
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
                        </div> --}}
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
                                                class="efect">Produtos<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{ route('checkout.index') }}" style="color: #952825;"
                                                class="efect">Checkout<i class="fas fa-chevron-down"></i></a></li>

                                        <?php if(Auth::check()){ ?>
                                        <li class="hassubs">
                                            <a href="#">{{ Auth::user()->name }}<i
                                                    class="fas fa-chevron-down"></i></a>
                                            <ul>

                                                <li><a href="{{ url('/addres') }}" style="color: #952825;"
                                                        class="efect">Meu Endereço<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="{{ url('/wishList') }}" style="color: #952825;"
                                                        class="efect">Lista Desejos<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="{{ url('/') }}/orders" style="color: #952825;"
                                                        class="efect">Lista Pedidos<i
                                                            class="fas fa-chevron-down"></i></a></li>

                                                <li><a href="{{ route('logout') }}" style="color: #952825;"
                                                        class="efect">Desconectar<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <?php }else{ ?>
                                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}"
                                                style="color: #952825;" class="efect">Entrar</a></li>
                                        <?php }?>
                                        {{-- <li><a href="contact.html" style="color: #952825;" class="efect">Contactos<i
                                                    class="fas fa-chevron-down"></i></a></li> --}}

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')

        {{-- 	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">

						<!-- Brands Slider -->
						<div class="owl-carousel owl-theme brands_slider">

							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('images/brands_2.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('images/brands_3.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('images/brands_4.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('images/brands_5.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('images/brands_6.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('images/brands_7.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('images/brands_8.jpg') }}" alt=""></div></div>


						</div>
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>
 --}}
        <!-- Newsletter -->

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
                                </script> Todos os direitos reservados | <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="https://okulandisa.net"
                                    target="_blank">okulandisa</a>
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="{{ asset('images/logos_1.png') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('images/logos_2.png') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('images/logos_3.png') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('images/logos_4.png') }}"
                                                alt=""></a></li>

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
    <script src="{{ asset('plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="js/shop_custom.js"></script>
    @yield('script')




</body>

</html>
