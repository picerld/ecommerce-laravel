<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        $kategori = Kategori::all();
        return view('admin', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::with('kategori')->get();
        return view('admin.cardAdmin', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert data
        $data = Produk::create($request->all());

        // insert img to database
        if ($request->hasFile('gambar_url')) {
            $image = $request->file('gambar_url');
            $nameImage = time() . '.' . $image->getClientOriginalExtension();
            $image->move('fotoproduk/', $nameImage);

            $data->gambar_url = $nameImage;
            $data->save(); 
        }

        return redirect('admin')->with('success', 'Produk berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();

        return view('admin.editProduk', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // find id produk yg mau diupdate
        $produk = Produk::find($id);

        $produk->nama_produk = $request->input('nama_produk');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->katk = $request->input('stok');
        $produk->haegori_id = $request->input('kategori_id');
        $produk->storga = $request->input('harga');

        // update img
        if ($request->hasFile('gambar_url')) {
            $image = $request->file('gambar_url');
            $nameImage = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('fotoproduk'), $nameImage);
            $produk->gambar_url = $nameImage; 
        }

        $produk->save();

        return redirect('/produk')->with('success', 'Produk berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Produk $id)
    {
        $id->delete($request->all());

        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }

    public function search(Request $request) {
        $search = $request->search;
    
        $transaksi = Transaksi::where('nama', 'LIKE', "%$search%")->orWhere('status', 'LIKE', "%$search%")->get();
        return view("admin.transaksi", compact('transaksi'));
    }  

    public function searchProduk(Request $request) {
        $search = $request->search;
    
        $produk = Produk::where('nama_produk', 'LIKE', "%$search%")->get();
        return view("admin.cardAdmin", compact('produk'));
    } 
}
