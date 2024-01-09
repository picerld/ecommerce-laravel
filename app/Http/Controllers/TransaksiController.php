<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all posts from Model
        $transaksi = Transaksi::with('user', 'produk')->get(); 

        return view('admin.transaksi', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function accept(Request $request, $id)
    {
        // find id produk yg mau diupdate
        $transaksi = Transaksi::find($id);

        $transaksi->status = 'berhasil';
        $transaksi->save();

        return redirect()->back()->with('success', 'Transaksi berhasil diupdate!');
    }

    public function decline(Request $request, $id)
    {
        // find id produk yg mau diupdate
        $transaksi = Transaksi::find($id);

        $transaksi->status = 'ditolak';
        $transaksi->save();

        return redirect()->back()->with('success', 'Transaksi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus');
        
    }

    public function detail($id)
    {
        $transaksi = Transaksi::find($id);

        return view('admin.detailTransaksi', compact('transaksi'));
    }
}
