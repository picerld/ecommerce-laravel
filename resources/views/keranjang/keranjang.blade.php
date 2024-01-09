@extends('layouts.template')

@section('content')

    <body>
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
                        <h3 class="breadcrumb-header">Keranjang</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Keranjang</li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>

        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-8">
                    @guest
                        <a href="{{ route('login') }}">Login</a>
                    @endguest
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach ($keranjang as $k)
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('fotoproduk/') }}/{{ $k->gambar_url }}" alt="produk img"
                                        class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        @if ($k->produk)
                                            <h5 class="card-title fs-1">{{ $k->produk->nama_produk }}</h5>
                                            <p class="card-text fs-1"><small class="text-muted">Harga: Rp.
                                                    {{ number_format($k->harga, 0, '.', '.') }}</small></p>
                                        @else
                                            <p class="card-text">Product not available</p>
                                        @endif
                                    </div>
                                    <form action="{{ route('cart.destroy', ['produk' => $k->id]) }}" method="POST"
                                        class="ml-3">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Ingin menghapus produk ini dari keranjang kamu?')">
                                            <i class="fa fa-close"></i> Remove
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        @if ($k->produk)
                            @php
                                $totalPrice += $k->jumlah * $k->harga;
                            @endphp
                        @endif
                    @endforeach

                </div>

                <!-- Checkout Section -->
                @if (count($keranjang) > 0)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Inpoice</h5>
                                @isset($k)
                                    <p class="card-text">Nama Pelanggan: {{ $k->user->name }}</p>
                                @endisset
                                <p class="card-text">Total Barang: {{ count($keranjang) }}</p>
                                <p class="card-text">Subtotal : Rp. {{ number_format($totalPrice, 0, '.', '.') }}</p>
                                @if (count($keranjang) > 0)
                                    <a href="{{ route('produk.checkout') }}" class="btn btn-primary btn-block"
                                        id="btnCheckout">Checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <h1>Keranjang Anda Kosong</h1>
                @endif

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </body>
@endsection
