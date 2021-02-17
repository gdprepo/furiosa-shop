<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('extra-meta')


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=https://fonts.googleapis.com/css?family=Inconsolata:400,500,600,700|Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="<?php echo asset('icofont/icofont.min.css') ?> " rel="stylesheet">
    <link href="<?php echo asset('aos/aos.css') ?>" rel="stylesheet">
    <link href="<?php echo asset('line-awesome/css/line-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo asset('owl.carousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">


    <!-- Style -->
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/styleShop.css') ?>">
    <link href="<?php echo asset('icofont/icofont.min.css') ?>" rel="stylesheet">
    <link href="<?php echo asset('aos/aos.css" rel="stylesheet') ?>">
    <link href="<?php echo asset('line-awesome/css/line-awesome.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/button.css') }}">
    <script src="https://unpkg.com/js-image-zoom@0.7.0/js-image-zoom.js" type="application/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/zoomove/1.2.1/zoomove.min.css">
    <link rel="stylesheet" href="<?php echo asset('css/zoom.css') ?>">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/69875fa1bc.js" crossorigin="anonymous"></script>

    @yield('link-extra')

    <title>Furioza Ali - Shop</title>

    @yield('extra-script')



    <?php
    $iPod    = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
    $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
    $iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
    $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
    $webOS   = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");

    $pageencours = $_SERVER['PHP_SELF'];
    $page = $_SERVER['REQUEST_URI'];

    ?>


    <style>
        .link {
            position: relative;
            font-size: 20px;
            margin: 0 30px;
            font-weight: 200;
            letter-spacing: 2px;
        }

        .link:hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 0;
            left: 0;
            bottom: 0px;
            /*Change this to increase/decrease distance*/
            border-bottom: 2px solid white;
        }

        .activeLink {
            position: relative;
            font-size: 20px;
            margin: 0 30px;
            font-weight: 200;
            letter-spacing: 2px;
        }

        .activeLink:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 0;
            left: 0;
            bottom: 0px;

            border-bottom: 2px solid white;

        }

        .navbar {
            z-index: 1000;
            position: fixed;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .nav-link {
            color: white !important;
        }

        .featurette-divider {
            margin: 5rem 0;
        }


        .shopSide {
            display: none;
        }

        @media (max-width: 800px) {
            .nav-item {
                display: none;
            }

            .shopSide {
                display: block;
            }
        }
    </style>

    @if ($iPad)
    <style>
        .badge-pill {
            margin-right: -5.5%;
        }
    </style>
    @elseif ($iPhone || $Android)

    <style>
        .badge-pill {
            margin-right: -12%
        }
    </style>
    @else
    <style>
        .badge-pill {
            margin-right: -3%;
        }
    </style>
    @endif
</head>

@if ((strpos(Route::currentRouteName(), 'shop.show') === 0))

<body style="background-image: linear-gradient(216deg, rgba(77, 77, 77,0.05) 0%, rgba(77, 77, 77,0.05) 25%,rgba(42, 42, 42,0.05) 25%, rgba(42, 42, 42,0.05) 38%,rgba(223, 223, 223,0.05) 38%, rgba(223, 223, 223,0.05) 75%,rgba(36, 36, 36,0.05) 75%, rgba(36, 36, 36,0.05) 100%),linear-gradient(44deg, rgba(128, 128, 128,0.05) 0%, rgba(128, 128, 128,0.05) 34%,rgba(212, 212, 212,0.05) 34%, rgba(212, 212, 212,0.05) 57%,rgba(25, 25, 25,0.05) 57%, rgba(25, 25, 25,0.05) 89%,rgba(135, 135, 135,0.05) 89%, rgba(135, 135, 135,0.05) 100%),linear-gradient(241deg, rgba(55, 55, 55,0.05) 0%, rgba(55, 55, 55,0.05) 14%,rgba(209, 209, 209,0.05) 14%, rgba(209, 209, 209,0.05) 60%,rgba(245, 245, 245,0.05) 60%, rgba(245, 245, 245,0.05) 69%,rgba(164, 164, 164,0.05) 69%, rgba(164, 164, 164,0.05) 100%),linear-gradient(249deg, rgba(248, 248, 248,0.05) 0%, rgba(248, 248, 248,0.05) 32%,rgba(148, 148, 148,0.05) 32%, rgba(148, 148, 148,0.05) 35%,rgba(202, 202, 202,0.05) 35%, rgba(202, 202, 202,0.05) 51%,rgba(181, 181, 181,0.05) 51%, rgba(181, 181, 181,0.05) 100%),linear-gradient(92deg, hsl(214,0%,11%),hsl(214,0%,11%));">

    @else

    <body>

        @endif

        <aside class="sidebar">

            <div id="example-sidenav" class="side-inner">



                @if ($iPhone || $Android)
                <div class="logo">
                    <img style="border-radius: 50%; width: 130%; border:1px solid black;" src="{{ asset('images/logo.jpg') }}" alt="">

                </div>
                <div class="nav-menu">
                    <h3 style="text-align:center; letter-spacing: 5px; font-size: 20px; margin-bottom: 15px">Shop</h3>

                    <div class="shopSide">
                        <ul>
                            <li class="{{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'active' : '' }}"><a href="/">Home</a></li>
                            <li class="{{ (strpos(Route::currentRouteName(), 'shop') === 0) ? 'active' : '' }}"><a href="/shop">Shop</a></li>
                            <li class="{{ (strpos(Route::currentRouteName(), 'about') === 0) ? 'active' : '' }}"><a href="/about">About</a></li>
                            <li class="{{ (strpos(Route::currentRouteName(), 'contact') === 0) ? 'active' : '' }}"><a href="/contact">Contact</a></li>


                        </ul>

                        <hr>


                    </div>


                    <ul>

                        <li><a href="#">Categorie1</a></li>
                        <li><a href="#">Categorie2</a></li>
                        <li><a href="#">Categorie3</a></li>

                        <hr>


                        @if (Auth::check())
                        @if (Auth::user()->role === "ROLE_ADMIN")
                        <li><a href="/admin">Admin</a></li>
                        @endif
                        @else
                        <li><a href="/login">Login</a></li>
                        @endif

                    </ul>

                    @elseif ($iPad )
                    <div style="float: right; margin-right: 30px; margin-top: 10px">
                        <i id="close" style="font-size: 45px; float:right" class="fas fa-times"></i>

                    </div>
                    <div class="logo row">
                        <img style="border-radius: 50%; width: 65px; height: 65px; border:1px solid black;" src="{{ asset('images/logo.jpg') }}" alt="">
                    </div>
                    <div class="nav-menu">
                        <h3 style="text-align:center; letter-spacing: 5px; font-size: 20px; margin-bottom: 15px">Shop</h3>

                        <div class="shopSide">
                            <ul>
                                <li class="{{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'active' : '' }}"><a href="/">Home</a></li>
                                <li class="{{ (strpos(Route::currentRouteName(), 'shop') === 0) ? 'active' : '' }}"><a href="/shop">Shop</a></li>
                                <li class="{{ (strpos(Route::currentRouteName(), 'about') === 0) ? 'active' : '' }}"><a href="/about">About</a></li>
                                <li class="{{ (strpos(Route::currentRouteName(), 'contact') === 0) ? 'active' : '' }}"><a href="/contact">Contact</a></li>


                            </ul>

                            <hr>



                        </div>


                        <ul>
                            <li><a href="#">Categorie1</a></li>
                            <li><a href="#">Categorie2</a></li>
                            <li><a href="#">Categorie3</a></li>


                            <hr>

                            @if (Auth::check())
                            @if (Auth::user()->role === "ROLE_ADMIN")
                            <li><a href="/admin">Admin</a></li>
                            @endif
                            @else
                            <li><a href="/login">Login</a></li>
                            @endif

                        </ul>
                        @else
                        <div class="logo">
                            <img style="border-radius: 50%; width: 130%; border:1px solid black;" src="{{ asset('images/logo.jpg') }}" alt="">

                        </div>
                        <div class="nav-menu">
                        <h3 style="text-align:center; letter-spacing: 5px; font-size: 20px; margin-bottom: 15px">Shop</h3>

                            <ul>

                                <li><a href="#">Categorie1</a></li>
                                <li><a href="#">Categorie2</a></li>
                                <li><a href="#">Categorie3</a></li>
                                <hr>
                                @if (Auth::check())
                                @if (Auth::user()->role === "ROLE_ADMIN")
                                <li><a href="/admin">Admin</a></li>
                                @endif
                                @else
                                <li><a href="/login">Login</a></li>
                                @endif

                            </ul>

                            @endif


                        </div>

                    </div>

        </aside>

        <main style="">

            @if ($iPhone|| $webOS || $Android)
            <nav style="position: relative; background-color: grey" class="navbar navbar-expand-lg navbar-light">

                <a style="color: white" class="navbar-brand" href="/">FURIOS<strong style="color: black;">ALI</strong></a>



                <ul style="text-align: center; display: -webkit-inline-box;" class="navbar-nav mx-auto nav-item">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'activeLink' : 'link' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'about') === 0) ? 'activeLink' : 'link' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'contact') === 0) ? 'activeLink' : 'link' }}" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'shop') === 0) ? 'activeLink' : 'link' }}" href="/shop">Shop</a>
                    </li>

                </ul>

                <span style="margin-bottom: 20px; z-index:2;" class="badge badge-pill badge-info text-white">{{ Cart::count() }}</span>

                <div id="bag" style="">
                    <a style="color: white" href="{{ route('cart.index') }}">
                        <i style="font-size: xx-large;" class="fas fa-shopping-bag"></i>
                    </a>
                </div>

                <div style="padding: 10px; margin-left: 15px; float: right; right: 0;" class="toggle">
                    <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span style="color: white"></span>
                    </a>
                </div>



            </nav>
            @elseif ($iPad )
            <nav style="position: relative;" class="navbar navbar-expand-lg navbar-light">

                <a style="color: white" class="navbar-brand" href="/">FURIOS<strong style="color: black;">ALI</strong></a>



                <ul style="text-align: center; display: -webkit-inline-box;" class="navbar-nav mx-auto nav-item">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'activeLink' : 'link' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'about') === 0) ? 'activeLink' : 'link' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'contact') === 0) ? 'activeLink' : 'link' }}" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'shop') === 0) ? 'activeLink' : 'link' }}" href="/shop">Shop</a>
                    </li>

                </ul>

                <span style="margin-bottom: 20px; z-index:2;" class="badge badge-pill badge-info text-white">{{ Cart::count() }}</span>

                <div id="bag" style="margin-right: 2%">
                    <a style="color: white" href="{{ route('cart.index') }}">
                        <i style="font-size: xx-large;" class="fas fa-shopping-bag"></i>
                    </a>
                </div>

                <div style="padding: 10px; margin-right: 20px; float: right; right: 0;" class="toggle">
                    <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span style="color: white"></span>
                    </a>
                </div>



            </nav>
            @else
            <nav class="navbar navbar-expand-lg navbar-light">

                <a style="color: white" class="navbar-brand" href="/">FURIOS<strong style="color: black;">ALI</strong></a>



                <ul style="text-align: center; display: -webkit-inline-box;" class="navbar-nav mx-auto nav-item">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'activeLink' : 'link' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'about') === 0) ? 'activeLink' : 'link' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'contact') === 0) ? 'activeLink' : 'link' }}" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'shop') === 0) ? 'activeLink' : 'link' }}" href="/shop">Shop</a>
                    </li>

                </ul>

                <span style="margin-bottom: 20px; z-index:2;" class="badge badge-pill badge-info text-white">{{ Cart::count() }}</span>

                <div id="bag" style="margin-right: 2%">
                    <a style="color: white" href="{{ route('cart.index') }}">
                        <i style="font-size: xx-large;" class="fas fa-shopping-bag"></i>
                    </a>
                </div>

                <div style="padding: 10px; margin-right: 20px; float: right; right: 0;" class="toggle">
                    <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span style="color: white"></span>
                    </a>
                </div>



            </nav>

            @endif




            <div class="">
                @yield('content')
            </div>

            @yield('footer')

            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

            @yield('script-extra')


            <!-- Vendor JS Files -->
            <script src="<?php echo asset('bootstrap/js/bootstrap.bundle.min.js') ?> "></script>
            <script src="<?php echo asset('jquery.easing/jquery.easing.min.js') ?>"></script>
            <script src="<?php echo asset('php-email-form/validate.js') ?>"></script>
            <script src="<?php echo asset('aos/aos.js') ?>"></script>
            <script src="<?php echo asset('isotope-layout/isotope.pkgd.min.js') ?>"></script>
            <script src="<?php echo asset('owl.carousel/owl.carousel.min.js') ?>"></script>



            <!-- Template Main JS File -->
            <script src="<?php echo asset('js/mainShop.js') ?>"></script>




            <script src="https://cdn.jsdelivr.net/npm/axentix@1.0.0/dist/js/axentix.min.js"></script>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


            <script>
                let exampleSidenav = new Axentix.Sidenav('#example-sidenav');

                $('#close').on('click', function() {
                    $('body').removeClass('show-sidebar');
                    $('.burger').removeClass('active');
                })
            </script>

            <script src="<?php echo asset('js/popper.min.js') ?>"></script>
            <script src="<?php echo asset('js/bootstrap.min.js') ?>"></script>
            <script src="<?php echo asset('js/main.js') ?>"></script>


    </body>

</html>