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

    <link href="<?php echo asset('mselect/chosen.min.css') ?>" rel="stylesheet">

    <link href="<?php echo asset('line-awesome/css/line-awesome.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@1.0.0/dist/css/axentix.min.css">




    <title>Furioza Ali - Admin</title>

    <style>
        nav {
            height: 80px !important;
        }
    </style>

</head>

<body class="layout with-sidenav">

    <header>
        <nav class="navbar shadow-1 primary">
            <a href="#" target="_blank" class="navbar-brand">
                <span style="font-weight: 200">Furiosa</span>
                <span style="font-weight: 400">Admin</span>

            </a>
            <div class="navbar-menu ml-auto">
                <div class="row mx-auto">
                    <div class="col-6 hide-md-up ">
                        <button data-target="example-sidenav" class="btn shadow-1 rounded-1 blue sidenav-trigger" type="submit">
                            Menu
                        </button>
                    </div>
                    <div class="col-6 ">
                        <a href="/logout">
                            <button class="btn shadow-1 rounded-1 blue" type="submit">
                                Logout
                            </button>
                        </a>
                    </div>


                </div>

            </div>
        </nav>
    </header>

    <div id="example-sidenav" data-ax="sidenav" class="example-sidenav sidenav shadow-1 large fixed white">
        <div class="sidenav-header">
            <button data-target="example-sidenav" class="sidenav-trigger">
                <i class="fas fa-times"></i>
            </button>

        </div>

        <a href="{{ route('dashboard') }}" class="sidenav-link ">Dashboard</a>
        <a href="{{ route('dashboard.home') }}" class="sidenav-link ">Accueil</a>
        <a href="{{ route('dashboard.products') }}" class="sidenav-link">Products</a>
        <a href="{{ route('dashboard.categories') }}" class="sidenav-link">Categories</a>
        <a href="{{ route('dashboard.about') }}" class="sidenav-link">About</a>
        <a href="{{ route('dashboard') }}" class="sidenav-link">Contact</a>


    </div>

    <main>

        @if (session('success'))
        <div style="width: 80%; margin-left: 10%; margin-right: auto;" class="p-3 my-2 rounded-2 success">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')

    </main>
    @yield('footer')




    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axentix@1.0.0/dist/js/axentix.min.js"></script>
    @yield('js-extra')

    <script>
        var sidenav = new Sidenav('.example-sidenav');
    </script>

</body>

</html>