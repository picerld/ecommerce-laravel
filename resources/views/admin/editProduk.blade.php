@extends('layouts.adminNav')

@section('tittle', 'admin')

@section('content')
    <main>
        <div class="container-fluid">
            @if (session('success'))
                <div id="alert" class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- start --}}
            <div class="container lg-12">
                <h1 class="mt-4">Product's Management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">{{ Auth::user()->name }}'s</li>
                </ol>
                <div class="card card-primary">

                    <div class="card-header bg-primary">
                        <h3 class="card-title text-white">Tambahkan Produk</h3>
                    </div>

                    <form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data"
                        class="m-3">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nama_produk" value="{{ $produk->nama_produk }}">
                            <div id="emailHelp" class="form-text">Nama produk kamu.</div>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example" name="kategori_id">
                            <option value="{{ $produk->kategori_id }}" selected hidden>{{ $produk->kategori->kategori }}
                            </option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="form-label">Deskripsi</label>
                            <textarea class="form-control" placeholder="Deskripsikan produk kamu" id="floatingTextarea" name="deskripsi">
                        {{ $produk->deskripsi }}
                    </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="stok" value="{{ $produk->stok }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                                name="harga" value="{{ $produk->harga }}">
                            <span class="input-group-text">.00</span>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto Produkmu</label>
                            <input class="form-control" type="file" id="formFile" accept="image/png" name="gambar_url"
                                value="{{ $produk->gambar_url }}">
                            <img src="{{ asset('fotoproduk') }}/{{ $produk->gambar_url }}" height="100px" width="100px">
                        </div>
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
