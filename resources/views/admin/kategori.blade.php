@extends('layouts.adminNav')

@section('tittle', 'admin')

@section('content')
    <main>
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- start --}}
            <div class="container lg-12">
                <h1 class="mt-4">Kategori Management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">{{ Auth::user()->name }}'s</li>
                </ol>
                <div class="card card-primary">

                    <div class="card-header bg-primary">
                        <h3 class="card-title text-white">Tambahkan Kategori</h3>
                    </div>

                    <form method="POST" action="{{ route('kategori.store') }}" class="m-3">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="kategori">
                            <div id="emailHelp" class="form-text">Nama kategori kamu.</div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
