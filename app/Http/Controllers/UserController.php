<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.beranda');
    }
    public function admin()
    {
        $kategori = Kategori::all();
        return view('admin.admin', compact('kategori'));
    }

    public function cekLogin()
    {
        $kategori = [];
        $produk = Produk::with('kategori')->get();

        if (auth()->check()) {
            $user = auth()->user();
            if ($user->role === 'admin') {
                return view('admin.cardAdmin', compact('produk'));
            } elseif ($user->role === 'pelanggan') {
                return view('user.beranda', compact('produk'));
            } else {
                return view('user.beranda', compact('produk'));
            }
        } else {
            return view('user.beranda', compact('produk'));
        }
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function detail($id)
    {
        $produk = Produk::find($id);

        return view('user.detail', compact('produk'));
    }

    public function produk()
    {
        $produk = Produk::with('kategori')->paginate(6);

        return view('user.produk', compact('produk'));
    }
}
