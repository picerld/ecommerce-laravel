@extends('layouts.template')

@section('content')

    <body>
        @if (session('success'))
            <div id="alert" class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
                    <ul class="main-nav nav navbar-nav">
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('produk.all') }}">Produk</a></li>
                        @guest
                        @else
                            <li><a href="{{ route('keranjang') }}">Keranjang</a></li>
                        @endguest
                    </ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /NAVIGATION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="{{ asset('assets/images') }}/nasi goreng.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Break<br>Fast</h3>
                                <a href="#" class="cta-btn">Buy now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->

                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="{{ asset('assets/images') }}/Tiramisu.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Dessert<br>Collection</h3>
                                <a href="#" class="cta-btn">Buy now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->

                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="{{ asset('assets/images') }}/pizza.jpg" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Fast<br>Food</h3>
                                <a href="#" class="cta-btn">Buy now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Our Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab1">
                                            All</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab1">
                                            Dessert
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab1">
                                            Makanan
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab1">
                                            Makan Besar
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab1">
                                            Makanan Lain
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <!-- product -->
                                        @foreach ($produk as $p)
                                            <div class="product" data-category="{{ $p->kategori->kategori }}">
                                                <div class="product-img" style="max-height: 290px; min-height: 290px">
                                                    <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}"
                                                        alt="product img" style="max-height: 300px; min-height: 250px">
                                                    <div class="product-label rounded">
                                                        <span class="new">{{ $p->kategori->kategori }}<span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">{{ $p->nama_produk }}</p>
                                                    <h3 class="product-name"><a href="#"></a></h3>
                                                    <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                            class="product-old-price">$990.00</del></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                                class="tooltipp">add to
                                                                wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                                class="tooltipp">add to
                                                                compare</span></button>
                                                        <button class="quick-view"><a
                                                                href="{{ route('produk.detail', $p->id) }}"><i
                                                                    class="fa fa-eye"></i><span class="tooltipp">quick
                                                                    view</span></a></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn">
                                                        @guest
                                                            <a href="{{ route('login') }}">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                add to cart
                                                            </a>
                                                        @else
                                                            <a href="{{ route('cart.tambah', ['produk' => $p->id]) }}">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                add to cart
                                                            </a>
                                                        @endguest
                                                    </button>

                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- /product -->
                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- HOT DEAL SECTION -->
        <div id="hot-deal" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="hot-deal">
                            <ul class="hot-deal-countdown">
                                <li>
                                    <div>
                                        <h3>02</h3>
                                        <span>Days</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>10</h3>
                                        <span>Hours</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>34</h3>
                                        <span>Mins</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>60</h3>
                                        <span>Secs</span>
                                    </div>
                                </li>
                            </ul>
                            <h2 class="text-uppercase">hot deal this week</h2>
                            <p>New Collection Up to 50% OFF</p>
                            <a class="primary-btn cta-btn" href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOT DEAL SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Makanan</h4>
                            <div class="section-nav">
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-3">
                            <div>
                                @foreach ($produk as $p)
                                    @if ($p->kategori->kategori === 'Makanan')
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $p->kategori->kategori }}</p>
                                                <h3 class="product-name"><a href="#">{{ $p->nama_produk }}</a></h3>
                                                <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                        class="product-old-price">$990.00</del></h4>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            @foreach ($produk as $p)
                                @if ($p->kategori->kategori === 'Makanan')
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $p->kategori->kategori }}</p>
                                            <h3 class="product-name"><a href="#">{{ $p->nama_produk }}</a></h3>
                                            <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                    class="product-old-price">$990.00</del></h4>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Dessert</h4>
                            <div class="section-nav">
                                <div id="slick-nav-4" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-4">
                            <div>
                                <div>
                                    @foreach ($produk as $p)
                                        @if ($p->kategori->kategori === 'Dessert')
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">{{ $p->kategori->kategori }}</p>
                                                    <h3 class="product-name"><a href="#">{{ $p->nama_produk }}</a>
                                                    </h3>
                                                    <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                            class="product-old-price">$990.00</del></h4>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                @foreach ($produk as $p)
                                    @if ($p->kategori->kategori === 'Dessert')
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $p->kategori->kategori }}</p>
                                                <h3 class="product-name"><a href="#">{{ $p->nama_produk }}</a>
                                                </h3>
                                                <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                        class="product-old-price">$990.00</del></h4>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="clearfix visible-sm visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Makanan Besar</h4>
                            <div class="section-nav">
                                <div id="slick-nav-5" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-5">
                            <div>
                                @foreach ($produk as $p)
                                    @if ($p->kategori->kategori === 'Makan Besar')
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $p->kategori->kategori }}</p>
                                                <h3 class="product-name"><a href="#">{{ $p->nama_produk }}</a>
                                                </h3>
                                                <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                        class="product-old-price">$990.00</del></h4>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div>
                                @foreach ($produk as $p)
                                    @if ($p->kategori->kategori === 'Makan Besar')
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $p->kategori->kategori }}</p>
                                                <h3 class="product-name"><a href="#">{{ $p->nama_produk }}</a>
                                                </h3>
                                                <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                        class="product-old-price">$990.00</del></h4>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Makanan Lain</h4>
                            <div class="section-nav">
                                <div id="slick-nav-6" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-6">
                            <div>
                                @foreach ($produk as $p)
                                    @if ($p->kategori->kategori === 'Makanan Lain')
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $p->kategori->kategori }}</p>
                                                <h3 class="product-name"><a href="#">{{ $p->nama_produk }}</a>
                                                </h3>
                                                <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                        class="product-old-price">$990.00</del></h4>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div>
                                @foreach ($produk as $p)
                                    @if ($p->kategori->kategori === 'Makanan Lain')
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $p->kategori->kategori }}</p>
                                                <h3 class="product-name"><a href="{{ route('produk.detail', $p->id) }}">{{ $p->nama_produk }}</a>
                                                </h3>
                                                <h4 class="product-price">Rp.{{ $p->harga }} <del
                                                        class="product-old-price">$990.00</del></h4>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>




        <!-- /SECTION -->

        <!-- NEWSLETTER -->
        <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter">
                            <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                            <form>
                                <input class="input" type="email" placeholder="Enter Your Email">
                                <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                            </form>
                            <ul class="newsletter-follow">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /NEWSLETTER -->

        <!-- FOOTER -->

        <!-- /FOOTER -->

        <!-- jQuery Plugins -->
        <script src="{{ asset('assets/toko') }}/js/jquery.min.js"></script>
        <script src="{{ asset('assets/toko') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('assets/toko') }}/js/slick.min.js"></script>
        <script src="{{ asset('assets/toko') }}/js/nouislider.min.js"></script>
        <script src="{{ asset('assets/toko') }}/js/jquery.zoom.min.js"></script>
        <script src="{{ asset('assets/toko') }}/js/main.js"></script>
        <script src="{{ asset('assets/toko') }}/js/filterProduk.js"></script>

    </body>
@endsection
