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
                    <h3 class="breadcrumb-header">History</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">History</li>
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
            @if (count($produk) > 0)
                <div class="row d-flex flex-wrap m-2">
                    @foreach ($produk as $p)
                        <div class="col-md-3 order-details" style="max-height: 400px; min-height: 400px">
                            <div class="section-title text-center">
                                <h3 class="title">Pesanan Kamu</h3>
                            </div>
                            <div class="order-summary" style="max-height: 200px; min-height: 150px">
                                <div class="order-col">
                                    <div><strong>Nama: </strong></div>
                                    <div><strong>{{ $p->user->name }}</strong></div>
                                </div>
                                <div class="order-products" style="max-height: 50px; min-height: 50px">
                                    <div class="order-col">
                                        <div>1x {{ $p->produk->nama_produk }}</div>
                                        <div>Rp. {{ $p->subtotal }}</div>
                                    </div>
                                </div>
                                <div class="order-col">
                                    <div>Ongkir</div>
                                    <div><strong>FREE</strong></div>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <label for="terms">
                                    <span></span>
                                    <center>Terimakasih sudah berbelanja di toko kami!</center>
                                </label>
                                <center>
                                    <script>
                                        document.write(new Date().toJSON().slice(0, 10));
                                    </script>
                                </center>
                            </div>
                            <a href="#" class="primary-btn order-submit">{{ $p->status }}</a>
                        </div>
                    @endforeach
                </div>
            @else
            <h3>Anda Belum Mempunyai Transaksi Apapun</h3>
            @endif
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
