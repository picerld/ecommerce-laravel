@extends('layouts.adminNav')

@section('title', 'admin')

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
                    <h1 class="mt-4">Transaksi Management</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">{{ Auth::user()->name }}'s</li>
                    </ol>
                    <div class="card card-primary">
                        <div class="card-header bg-primary">
                            <h3 class="card-title text-white float-sm-start">Dashboard Transaksi</h3>
                            {{-- search bar --}}
                            <form
                                class="float-sm-end d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 pb-2"
                                action="{{ route('admin.search') }}" method="GET">
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
                                    <th>Nama Pelanggan</th>
                                    <th>Produk</th>
                                    <th>Image</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $t)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            {{ $t->user->name }}
                                        </td>
                                        <td>{{ $t->produk->nama_produk }}</td>
                                        <td>
                                            <img src="{{ asset('fotoproduk') }}/{{ $t->gambar_url }}"
                                                style="max-height: 50px;">
                                        </td>
                                        <td>Rp. {{ $t->subtotal }}</td>
                                        <td>{{ $t->status }}</td>
                                        <td>
                                            @if ($t->status == 'berhasil' || $t->status == 'ditolak')
                                                <form action="{{ route('transaksi.destroy', ['id' => $t->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-warning"
                                                        onclick="return confirm('Anda yakin ingin menghapus transaksi ini??')">
                                                        Hapus Transaksi
                                                    </button>
                                                    <a href="{{ route('transaksi.detail', ['id' => $t->id]) }}"
                                                        class="btn btn-outline-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">Detail</a>
                                                </form>
                                            @else
                                                <a href="{{ route('transaksi.accept', ['id' => $t->id]) }}"
                                                    class="btn btn-outline-success">
                                                    Accept
                                                </a>

                                                <a href="{{ route('transaksi.decline', ['id' => $t->id]) }}"
                                                    class="btn btn-outline-danger">
                                                    Decline
                                                </a>
                                                {{-- <a href="{{ route('transaksi.detail', ['id' => $t->id]) }}"
                                                    class="btn btn-outline-primary">Detail</a> --}}
                                            @endif

                                            <!-- Button trigger modal -->


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Transaksi Detail</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ini detail transaksi ya
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
