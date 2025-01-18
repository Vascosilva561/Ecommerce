<!DOCTYPE html>
<html lang="Pt-pt">

<head>
    <title>JM2X E-commerce</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="JM2X E-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">

    <style>
        .efect {
            display: flex;
            cursor: pointer !important;
        }

        .efect svg {
            stroke: #4d4d4d;
            margin-top: "auto";
            margin-bottom: "auto";
        }

        .efect:hover {
            color: #952825 !important;
            text-decoration: none !important;
        }

        .efect:hover svg {
            stroke: #952825 !important;
        }

        .custom_dropdown_placeholder.clc {
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
        }
    </style>
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
                                                placeholder="Procurar productos">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list d-flex align-items-center">
                                                    <span class="custom_dropdown_placeholder clc mr-auto">Todas
                                                        Categorias</span>
                                                    <i class="fas fa-chevron-down pr-2"></i>
                                                    <ul class="custom_list clc">
                                                        <?php $searchCategories = DB::table('categories')->get(); ?>
                                                        <li><a class="clc" href="#">Todas Categorias
                                                                <i class="fas fa-chevron-right ml-auto"></i></a>
                                                        </li>
                                                        @foreach ($searchCategories as $category)
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
                                        <li><a class="d-flex efect" href="{{ route('home') }}">
                                                <div class="d-flex my-auto pb-1 mr-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M9 22V12H15V22" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                Inicio
                                            </a></li>

                                        <li><a class="d-flex efect" href="{{ route('shop.index') }}">
                                                <div class="d-flex my-auto pb-1 mr-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24" fill="none">
                                                        <path d="M16.5 9.39999L7.5 4.20999" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M21 16V7.99999C20.9996 7.64927 20.9071 7.3048 20.7315 7.00116C20.556 6.69751 20.3037 6.44536 20 6.26999L13 2.26999C12.696 2.09446 12.3511 2.00204 12 2.00204C11.6489 2.00204 11.304 2.09446 11 2.26999L4 6.26999C3.69626 6.44536 3.44398 6.69751 3.26846 7.00116C3.09294 7.3048 3.00036 7.64927 3 7.99999V16C3.00036 16.3507 3.09294 16.6952 3.26846 16.9988C3.44398 17.3025 3.69626 17.5546 4 17.73L11 21.73C11.304 21.9055 11.6489 21.9979 12 21.9979C12.3511 21.9979 12.696 21.9055 13 21.73L20 17.73C20.3037 17.5546 20.556 17.3025 20.7315 16.9988C20.9071 16.6952 20.9996 16.3507 21 16Z"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M3.27 6.95999L12 12.01L20.73 6.95999" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M12 22.08V12" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                Productos
                                            </a></li>
                                        <?php if(Auth::check()){ ?>
                                        <li><a class="d-flex efect" href="{{ route('cart.index') }}">
                                                <div class="d-flex my-auto pb-1 mr-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                Carrinho @if (Cart::instance('default')->count() > 0)
                                                    <span
                                                        class="my-auto ml-1 text-white badge bg-primary">{{ Cart::instance('default')->count() }}</span>
                                                @endif
                                            </a></li>
                                        <li><a class="d-flex efect" href="/orders">
                                                <div class="d-flex my-auto pb-1 mr-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M6 2L3 6V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V6L18 2H6Z"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M3 6H21" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M16 10C16 11.0609 15.5786 12.0783 14.8284 12.8284C14.0783 13.5786 13.0609 14 12 14C10.9391 14 9.92172 13.5786 9.17157 12.8284C8.42143 12.0783 8 11.0609 8 10"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                Pedidos
                                            </a></li>
                                        <li class="hassubs">
                                            <a href="#" class="d-flex justify-content-center efect">
                                                <div class="d-flex my-auto pb-1 mr-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <span>
                                                    {{ Auth::user()->name }}<i class="fas fa-chevron-down"></i>
                                                </span>
                                            </a>
                                            <ul>

                                                <li><a href="{{ url('/profile/address') }}" style="color: #952825;"
                                                        class="efect">Meu Endereço<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="{{ url('/wishlist') }}" style="color: #952825;"
                                                        class="efect">Lista Desejos<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="{{ url('/') }}/orders" style="color: #952825;"
                                                        class="efect">Lista Pedidos<i
                                                            class="fas fa-chevron-down"></i></a></li>

                                                <li class="d-flex align-items-end">
                                                    <a style="color: #952825;" class="efect my-auto">
                                                        <form action="{{ route('logout') }}" method="POST"
                                                            class="pt-8">
                                                            @csrf
                                                            <button role="button"
                                                                class="btn btn-link cursor-pointer p-0 text-decoration-none hover:text-decoration-none efect mt-auto"
                                                                type="submit" style="color: #952825;">Desconectar<i
                                                                    class="fas fa-chevron-down"></i></button>
                                                        </form>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
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
                            <div class="newsletter_title_container d-flex mr-4 align-items-center">
                                <div class="newsletter_icon mr-2 flex-1"><img src="images/icons/mensagens.png"
                                        alt="">
                                </div>
                                <div>
                                    <div class="newsletter_title">Inscreva-se no boletim Informativo</div>
                                    <div class="newsletter_text text-nowrap">
                                        <p>Fique por todas as novidades e promoções da loja!</p>
                                    </div>
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
                            <div class="footer_phone" style="color: #a12421;"> +244 940 803 094</div>

                            <div class="footer_social">
                                <ul>
                                    <li><a href="https://www.facebook.com/jm2x09?mibextid=ZbWKwL"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/geral.jm2x?igsh=MWcyNXBvem0wM2FydQ=="><i
                                                class="fab fa-instagram"></i></a></li>
                                    {{-- <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li> --}}
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
                                <li><a href="{{ route('profile.address') }}">Minha Conta</a></li>
                                {{-- <li><a href="#">Rastreamento de pedido</a></li> --}}
                                <li><a href="{{ route('wishlist') }}">Lista de Desejos</a></li>
                                <li><a href="{{ route('admin.login') }}">Entrar como Admin</a></li>
                                {{-- <li><a href="#">Atendimento ao cliente</a></li> --}}

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
                                    aria-hidden="true"></i> by <a href="https://" target="_blank">Vasco Silva</a>
                            </div>
                            {{-- <div class="logos ml-sm-auto">
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
                            </div> --}}
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

    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('script')




</body>

</html>
