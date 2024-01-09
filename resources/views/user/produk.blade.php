@extends('layouts.template')

@section('content')
    @if (session('success'))
        <div id="alert" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Produk</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Produk</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-2">
                                <label for="category-2">
                                    <span></span>
                                    Makanan
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-2">
                                <label for="category-2">
                                    <span></span>
                                    Makanan Besar
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-2">
                                <label for="category-2">
                                    <span></span>
                                    Makanan Lain
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-2">
                                <label for="category-2">
                                    <span></span>
                                    Dessert
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal">
                                <div class="noUi-base">
                                    <div class="noUi-origin" style="left: 0%;">
                                        <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0"
                                            role="slider" aria-orientation="horizontal" aria-valuemin="0.0"
                                            aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="1.00"
                                            style="z-index: 5;"></div>
                                    </div>
                                    <div class="noUi-connect" style="left: 0%; right: 0%;"></div>
                                    <div class="noUi-origin" style="left: 100%;">
                                        <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0"
                                            role="slider" aria-orientation="horizontal" aria-valuemin="0.0"
                                            aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="999.00"
                                            style="z-index: 4;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-1">
                                <label for="brand-1">
                                    <span></span>
                                    SAMSUNG
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-2">
                                <label for="brand-2">
                                    <span></span>
                                    LG
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-3">
                                <label for="brand-3">
                                    <span></span>
                                    SONY
                                    <small>(755)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-4">
                                <label for="brand-4">
                                    <span></span>
                                    SAMSUNG
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-5">
                                <label for="brand-5">
                                    <span></span>
                                    LG
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-6">
                                <label for="brand-6">
                                    <span></span>
                                    SONY
                                    <small>(755)</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product01.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product02.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product03.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        @foreach ($produk as $p)
                            <div class="col-md-4 col-xs-6">
                                <div class="product" data-category="{{ $p->kategori->kategori }}">
                                    <div class="product-img" style="max-height: 290px; min-height: 290px">
                                        <img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}" alt="produk img"
                                            style="max-height: 300px; min-height: 250px">
                                        <div class="product-label">
                                            <span class="sale">NEW</span>
                                            <span class="new">{{ $p->kategori->kategori }}</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $p->kategori->kategori }}</p>
                                        <h3 class="product-name"><a
                                                href="{{ route('produk.detail', $p->id) }}">{{ $p->nama_produk }}</a></h3>
                                        <h4 class="product-price">Rp {{ number_format($p->harga, 0, '.', '.') }}<del
                                                class="product-old-price">$990.00</del>
                                        </h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><a href="{{ route('produk.detail', $p->id) }}"><i
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
                            </div>
                        @endforeach
                        <!-- /product -->
                    </div>

                    <!-- /store products -->
                    <div
                        style="display: flex; justify-content: center; align-items: center; flex-direction: column; padding-top: 50px;">
                        <h2 class="small text-muted text-uppercase">
                            {!! __('Showing') !!}
                            <span class="fw-semibold">{{ $produk->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="fw-semibold">{{ $produk->lastItem() }}</span>
                            {!! __('of') !!}
                            <span class="fw-semibold">{{ $produk->total() }}</span>
                            {!! __('results') !!}
                        </h2>
                        {{ $produk->links() }}
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <script src="{{ asset('assets/toko') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/toko') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/toko') }}/js/slick.min.js"></script>
    <script src="{{ asset('assets/toko') }}/js/nouislider.min.js"></script>
    <script src="{{ asset('assets/toko') }}/js/jquery.zoom.min.js"></script>
    <script src="{{ asset('assets/toko') }}/js/main.js"></script>
    <script src="{{ asset('assets/toko') }}/js/pagination.js"></script>
@endsection
