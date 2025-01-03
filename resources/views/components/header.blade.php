<header class="header">
    @component('components.top_bar')
    @endcomponent
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="#"><img src="{{ asset('images/icons/logo-shopp.png') }}"
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

            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist_icon"><img src="{{ asset('images/heart.png') }}" alt=""></div>
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

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <div class="cat_menu_container" style="background-color: #952825;">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
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
                                <li><a href="{{ route('home') }}" style="color: #952825;" class="efect">Inicio<i
                                            class="fas fa-chevron-down"></i></a></li>

                                <li><a href="{{ route('shop.index') }}" style="color: #952825;"
                                        class="efect">Produtos<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="{{ route('checkout.index') }}" style="color: #952825;"
                                        class="efect">Checkout<i class="fas fa-chevron-down"></i></a></li>

                                <?php if(Auth::check()){ ?>
                                <li class="hassubs">
                                    <a href="#">{{ Auth::user()->name }}<i class="fas fa-chevron-down"></i></a>
                                    <ul>

                                        <li><a href="{{ url('/') }}/profile" style="color: #952825;"
                                                class="efect">Perfil<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{ route('logout') }}" style="color: #952825;"
                                                class="efect">Desconectar<i class="fas fa-chevron-down"></i></a></li>
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
