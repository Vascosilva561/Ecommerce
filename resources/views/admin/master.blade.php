<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Paínel Administrativo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.ico') }}">
    <!-- Google Fonts
  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <!-- nalika Icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/nalika-icon.css') }}">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/owl.transitions.css') }}">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/animate.css') }}">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
    <!-- meanmenu icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/meanmenu.min.css') }}">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <!-- morrisjs CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    <!-- modernizr JS
  ============================================ -->
    <script src="{{ asset('admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    @yield('style')
</head>

<body>

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}"><img class="main-logo"
                        src="{{ asset('images/icons/Logowhite.png') }}" style="width: 150px; margin-top: 20px;"
                        alt="" /></a>
                <strong><img src="{{ asset('images/icons/Logowhite.png') }}"
                        style="width: 200px; margin-top: 65px;"></strong>
            </div>
            <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="#">
                        <div
                            style="border-radius: 999%; padding: 20px; background-color: #364B73; width: 90px; height: 90px; margin-left: auto; margin-right: auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 47 47"
                                fill="none">
                                <path
                                    d="M39.0197 40.9316V37.1071C39.0197 35.0784 38.2138 33.1329 36.7793 31.6984C35.3448 30.2639 33.3993 29.458 31.3706 29.458H16.0724C14.0438 29.458 12.0982 30.2639 10.6637 31.6984C9.22922 33.1329 8.42334 35.0784 8.42334 37.1071V40.9316"
                                    stroke="#152036" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M23.7218 21.8089C27.9463 21.8089 31.3709 18.3843 31.3709 14.1598C31.3709 9.93535 27.9463 6.51074 23.7218 6.51074C19.4974 6.51074 16.0728 9.93535 16.0728 14.1598C16.0728 18.3843 19.4974 21.8089 23.7218 21.8089Z"
                                    stroke="#152036" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                    <h2>{{ auth()->guard('admin')->user()->name }}</h2>
                </div>

            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow">
                                <i class="icon nalika-home icon-wrap"></i>
                                <span class="mini-click-non">Ecommerce</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Product List" href="{{ route('admin.dashboard') }}"><span
                                            class="mini-sub-pro">Dashboard</span></a></li>
                                <li><a title="Product List" href="{{ route('admin.categories.index') }}"><span
                                            class="mini-sub-pro">Categorias</span></a></li>
                                <li><a title="Product Edit" href="{{ route('admin.products.index') }}"><span
                                            class="mini-sub-pro">Productos</span></a></li>
                                <li><a title="Product Cart" href="{{ route('admin.orders.index') }}"><span
                                            class="mini-sub-pro">Pedidos</span></a></li>
                                <li><a title="Product Payment" href="{{ route('admin.payments.index') }}"><span
                                            class="mini-sub-pro">Pagamentos</span></a></li>
                                <li><a title="Product Payment" href="{{ route('admin.bank-accounts.index') }}"><span
                                            class="mini-sub-pro">Contas Bancárias</span></a></li>
                                <li><a title="Product Payment" href="{{ route('admin.suppliers.index') }}"><span
                                            class="mini-sub-pro">Fornecedores</span></a></li>
                                <li><a title="Product Payment" href="{{ route('admin.clients.index') }}"><span
                                            class="mini-sub-pro">Clientes</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-arrow-left"></i>
                                <span class="mini-click-non">Ir ao site</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                    class="icon nalika-mail icon-wrap"></i> <span
                                    class="mini-click-non">Mailbox</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="mailbox.html"><span class="mini-sub-pro">Inbox</span></a>
                                </li>
                                <li><a title="View Mail" href="mailbox-view.html"><span class="mini-sub-pro">View
                                            Mail</span></a></li>
                                <li><a title="Compose Mail" href="mailbox-compose.html"><span
                                            class="mini-sub-pro">Compose Mail</span></a></li>
                            </ul>
                        </li> --}}



                        {{-- <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                    class="icon nalika-new-file icon-wrap"></i> <span
                                    class="mini-click-non">Pages</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Login" href="login.html"><span class="mini-sub-pro">Login</span></a>
                                </li>
                                <li><a title="Register" href="register.html"><span
                                            class="mini-sub-pro">Register</span></a></li>
                                <li><a title="Lock" href="lock.html"><span class="mini-sub-pro">Lock</span></a>
                                </li>
                                <li><a title="Password Recovery" href="password-recovery.html"><span
                                            class="mini-sub-pro">Password Recovery</span></a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper" style="display: flex;">
                                <div class="row" style="justify-content: end; display: flex; width: 100%; flex: 1">
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="icon nalika-user"></i>
                                                        <span
                                                            class="admin-name">{{ auth()->guard('admin')->user()->name }}</span>
                                                        <i class="icon nalika-down-arrow nalika-angle-dw"></i>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="{{ route('admin.logout') }}"><span
                                                                    class="icon nalika-unlocked author-log-ic"></span>
                                                                Sair</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Dashboard v.1</a></li>
                                                <li><a href="index-1.html">Dashboard v.2</a></li>
                                                <li><a href="index-3.html">Dashboard v.3</a></li>
                                                <li><a href="product-list.html">Product List</a></li>
                                                <li><a href="product-edit.html">Product Edit</a></li>
                                                <li><a href="product-detail.html">Product Detail</a></li>
                                                <li><a href="product-cart.html">Product Cart</a></li>
                                                <li><a href="product-payment.html">Product Payment</a></li>
                                                <li><a href="analytics.html">Analytics</a></li>
                                                <li><a href="widgets.html">Widgets</a></li>
                                            </ul>
                                        </li>
                                        {{-- <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox
                                                <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                        <li><a data-toggle="collapse" data-target="#others"
                                                href="#">Miscellaneous <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="file-manager.html">File Manager</a></li>
                                                <li><a href="contacts.html">Contacts Client</a></li>
                                                <li><a href="projects.html">Project</a></li>
                                                <li><a href="project-details.html">Project Details</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                                <li><a href="500.html">500 Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob"
                                                href="#">Interface <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                                <li><a href="x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="code-editor.html">Code Editor</a>
                                                </li>
                                                <li><a href="tree-view.html">Tree View</a>
                                                </li>
                                                <li><a href="preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="images-cropper.html">Images Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts
                                                <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="area-charts.html">Area Charts</a>
                                                </li>
                                                <li><a href="rounded-chart.html">Rounded Charts</a>
                                                </li>
                                                <li><a href="c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="sparkline.html">Sparkline Charts</a>
                                                </li>
                                                <li><a href="peity.html">Peity Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables
                                                <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms
                                                <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App
                                                views <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        {{-- <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages
                                                <span
                                                    class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="login.html">Login</a>
                                                </li>
                                                <li><a href="register.html">Register</a>
                                                </li>
                                                <li><a href="lock.html">Lock</a>
                                                </li>
                                                <li><a href="password-recovery.html">Password Recovery</a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')


            <div class="footer-copyright-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-copy-right">
                                <p>© Copyright 2025 JM2X, Todos os direitos reservados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jquery
  ============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap JS
  ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS
  ============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS
  ============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- meanmenu JS
  ============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
  ============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- sticky JS
  ============================================ -->
        <script src="js/jquery.sticky.js"></script>
        <!-- scrollUp JS
  ============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- mCustomScrollbar JS
  ============================================ -->
        <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
        <!-- metisMenu JS
  ============================================ -->
        <script src="js/metisMenu/metisMenu.min.js"></script>
        <script src="js/metisMenu/metisMenu-active.js"></script>
        <!-- sparkline JS
  ============================================ -->
        <script src="js/sparkline/jquery.sparkline.min.js"></script>
        <script src="js/sparkline/jquery.charts-sparkline.js"></script>
        <!-- calendar JS
  ============================================ -->
        <script src="js/calendar/moment.min.js"></script>
        <script src="js/calendar/fullcalendar.min.js"></script>
        <script src="js/calendar/fullcalendar-active.js"></script>
        <!-- float JS
  ============================================ -->
        <script src="js/flot/jquery.flot.js"></script>
        <script src="js/flot/jquery.flot.resize.js"></script>
        <script src="js/flot/curvedLines.js"></script>
        <script src="js/flot/flot-active.js"></script>
        <!-- plugins JS
  ============================================ -->
        <script src="js/plugins.js"></script>
        <!-- main JS
  ============================================ -->
        <script src="js/main.js"></script>
</body>

</html>
