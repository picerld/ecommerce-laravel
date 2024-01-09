<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// user & produk
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [UserController::class, 'cekLogin'])->name('home');
Route::get('/beranda', [UserController::class, 'cekLogin']);
Route::get('/admin', [UserController::class, 'admin'])->middleware('ceklogin:admin')->name('produk.admin');
Route::get('/profile', [UserController::class, 'profile'])->name('pelanggan.profile');
Route::get('/detail/{id}', [UserController::class, 'detail'])->name('produk.detail');

Route::get('/allProduk', [userController::class,'produk'])->name('produk.all');

// admin
Route::post('/tambah', [AdminController::class, 'store'])->name('produk.store');
Route::get('/produk', [AdminController::class, 'create'])->middleware('ceklogin:admin')->name('produk.create');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name("produk.destroy");
Route::get('/produk/{produk}/edit', [AdminController::class, 'edit'])->name("produk.edit");
Route::put('/produk/{produk}', [AdminController::class, 'update'])->name("produk.update");
Route::get('/search', [AdminController::class, 'search'])->name("admin.search");
Route::get('/searchProduk', [AdminController::class, 'searchProduk'])->name("admin.produkSearch");

// kategori
Route::get('/berandaKategori', [KategoriController::class, 'beranda'])->middleware('ceklogin:admin')->name("kategori.show");
Route::get('/kategori', [KategoriController::class, 'index'])->middleware('ceklogin:admin')->name("produk.kategori");
Route::post('/tambahKategori', [KategoriController::class, 'store'])->name("kategori.store");
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name("kategori.destroy");

// keranjang
Route::get('/keranjang', [ProdukController::class, 'index'])->name('keranjang');
Route::get('/keranjangTambah/{produk}', [ProdukController::class, 'tambah'])->name('cart.tambah');
Route::delete('/kategoriDelete/{produk}', [ProdukController::class, 'hapus'])->name("cart.destroy");
Route::get('/checkOut', [ProdukController::class, 'checkOut'])->name('produk.checkout');
Route::get('/history', [ProdukController::class, 'show'])->name("history");

// transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->middleware('ceklogin:admin')->name('transaksi.index');
Route::get('/accept/{id}', [TransaksiController::class, 'accept'])->name('transaksi.accept');
Route::get('/decline/{id}', [TransaksiController::class, 'decline'])->name('transaksi.decline');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name("transaksi.destroy");
Route::get('/detailTransaksi/{id}', [TransaksiController::class, 'detail'])->name('transaksi.detail');