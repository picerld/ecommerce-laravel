<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Foodpiece</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/toko') }}/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/toko') }}/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/toko') }}/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/toko') }}/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/toko') }}/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/toko') }}/css/style.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/toko/js/durasiAlert.js"></script>
    <script src="assets/toko/js/filterProduk.js"></script>
    <script src="assets/toko/js/pagination.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/toko') }}/css/alert.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<header class="sticky-top">
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +62 8211 9888 459</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> raficahyadi1221@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Bandung, Cimahi</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                @guest
                    <li><a href="#"><i class="fa fa-user-o"></i>Guest</a></li>
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="fa fa-sign-in"></i>
                            {{ __('Login') }}
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('keranjang') }}">
                            <i class="fa fa-shopping-cart"></i>
                            Keranjang
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('history') }}">
                            <i class="fa fa-shopping-bag"></i>
                            History
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('pelanggan.profile') }}">
                            <i class="fa fa-user-o font-monospace"></i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out font-monospace"></i>
                            {{ __('Logout') }}
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="{{ asset('assets/images/logo (2).png') }}" alt="logo img" height="100px"
                                width="100%">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        {{-- <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <a href="{{ route('keranjang') }}"><i class="fa fa-shopping-cart"></a></i>
                                <span style="color: white; font-weight: 16px">Your Cart</span>
                                <div class="qty"></div>
                            </a>
                        </div> --}}
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>

</html>
