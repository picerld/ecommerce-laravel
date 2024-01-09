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
            <div class="col-lg-12">
                <div class="container lg-12">
                    <h1 class="mt-4">Product's Management</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">{{ Auth::user()->name }}'s</li>
                    </ol>
                    <div class="card card-primary">
                        <div class="card-header bg-primary">
                            <h3 class="card-title text-white float-sm-start">Dashboard Produk</h3>
                            {{-- search bar --}}
                            <form class="float-sm-end d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 pb-2"
                                action="{{ route('admin.produkSearch') }}" method="GET">
                                @csrf
                                <div class="input-group">
                                    <input name="search" class="form-control" type="text" placeholder="Search for..."
                                        aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                    <button value="search" class="btn btn-light" id="btnNavbarSearch" type="submit"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </form>
                            {{-- end --}}
                        </div>
                        <table class="table table-striped text-center">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $p)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><img src="{{ asset('fotoproduk') }}/{{ $p->gambar_url }}" alt="Product Image"
                                                style="max-height: 50px;"></td>
                                        <td>{{ $p->nama_produk }}</td>
                                        <td>{{ $p->deskripsi }}</td>
                                        <td>{{ $p->kategori->kategori }}</td>
                                        <td>{{ $p->stok }}</td>
                                        <td>Rp.{{ $p->harga }}</td>
                                        <td>
                                            <form action="{{ route('produk.destroy', $p->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <a href="{{ route('produk.edit', $p->id) }}"
                                                    class="btn btn-outline-primary">Edit</a>
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
