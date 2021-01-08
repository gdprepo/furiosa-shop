<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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



    <title>Furioza Ali - Shop</title>

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

        .navbar {
            z-index: 1;
            position: absolute;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .nav-link {
            color: white !important;
        }

        .featurette-divider {
            margin: 5rem 0;
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="side-inner">

            <div class="logo">
                <span>L</span>

            </div>

            <div class="nav-menu">
                <ul>
                    <li class="active"><a href="#">Categorie1</a></li>
                    <li><a href="#">Categorie2</a></li>
                    <li><a href="#">Categorie3</a></li>
                </ul>
            </div>

        </div>

    </aside>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light">

            <a style="color: white" class="navbar-brand" href="#">FURIOZ<strong style="color: black;">ALI</strong></a>



            <ul style="text-align: center; display: -webkit-inline-box;" class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link" href="/shop">Shop</a>
                </li>

            </ul>



            <div style="padding: 10px; margin-right: 20px; float: right; right: 0;" class="toggle">
                <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                    <span style="color: white"></span>
                </a>
            </div>



        </nav>

        <div class="">
            @yield('content')
        </div>

        @yield('footer')


  <!-- Vendor JS Files -->
  <script src="<?php echo asset('jquery/jquery.min.js')?>"></script>
  <script src="<?php echo asset('bootstrap/js/bootstrap.bundle.min.js')?> "></script>
  <script src="<?php echo asset('jquery.easing/jquery.easing.min.js')?>"></script>
  <script src="<?php echo asset('php-email-form/validate.js')?>"></script>
  <script src="<?php echo asset('aos/aos.js')?>"></script>
  <script src="<?php echo asset('isotope-layout/isotope.pkgd.min.js')?>"></script>
  <script src="<?php echo asset('owl.carousel/owl.carousel.min.js')?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo asset('js/mainShop.js')?>"></script>






  <script src="<?php echo asset('js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?php echo asset('js/popper.min.js')?>"></script>
  <script src="<?php echo asset('js/bootstrap.min.js')?>"></script>
  <script src="<?php echo asset('js/main.js')?>"></script>
</body>

</html>