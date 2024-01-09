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
                    <h1 class="mt-4">Kategori Management</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">{{ Auth::user()->name }}'s</li>
                    </ol>
                    <div class="card card-primary">
                        <div class="card-header bg-primary">
                            <h3 class="card-title text-white">Dashboard Kategori</h3>
                        </div>

                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $k)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $k->kategori }}</td>
                                        <td>
                                            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <a href="" class="btn btn-outline-primary">Edit</a>
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Anda yakin ingin menghapus kategori?')">Delete</button>
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
