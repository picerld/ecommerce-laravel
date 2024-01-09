<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        // menampilkan keranjang sesuai user id
        $userId = auth()->id();

        // find id user
        $keranjang = Keranjang::where('user_id', $userId)->get();

        // find produk yg ditambahkan ke cart
        $keranjangNav = Keranjang::where('user_id', auth()->id())->withSum('produk', 'nama_produk')->count();

        return view('keranjang.keranjang', compact('keranjang', 'keranjangNav'));
    }

    public function tambah($ProdukID)
    {
        // insert ke tabel keranjang
        $user = auth()->user();
        $userId = auth()->user()->id;

        $produk = Produk::find($ProdukID);

        $harga = $produk->harga;
        $jumlahProduk = 1;

        $total = $harga * $jumlahProduk;

        $keranjang = new Keranjang;

        $keranjang->user_id = $userId;
        $keranjang->nama = $user->name;
        $keranjang->produk_id = $produk->id;
        $keranjang->harga = $produk->harga;
        $keranjang->jumlah = $jumlahProduk;
        $keranjang->total = $total;
        $keranjang->gambar_url = $produk->gambar_url;

        $keranjang->save();

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function hapus(Request $request, Keranjang $produk)
    {
        $produk->delete($request->all());

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }

    public function checkOut()
    {
        // insert dari keranjang ke tabel transaksi
        $user = Auth::user();
        $userId = $user->id;

        $data = Keranjang::where('user_id', '=', $userId)->get();

        foreach ($data as $data) {
            $order = new Transaksi;

            $order->id_user = $user->id;
            $order->id_produk = $data->produk_id;
            $order->nama = $data->nama;
            $order->subtotal = $data->total;
            $order->gambar_url = $data->gambar_url;
            $order->status = 'sedang diproses';

            $order->save();

            // abis di checkout, dihapus dari keranjang
            $keranjangId = $data->id;
            $keranjang = Keranjang::find($keranjangId);
            
            // proses pengurangan stok
            $product = Produk::find($keranjang->produk_id);
            $product->stok -= $keranjang->jumlah; 
            $product->save();

            $keranjang->delete();
        }

        return redirect()->back()->with('success', 'Produk sedang diproses, harap tunggu');
    }

    public function show()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userID = $user->id;
            $produk = Transaksi::where('id_user', '=', $userID)->get();

            return view('user.pesanan', compact('produk'));
        } else {
            return redirect('login');
        }
    }
}
