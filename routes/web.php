<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputruanganController;
use App\Http\Controllers\InputrusakController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\KeranjangkeluarController;
use App\Http\Controllers\KeranjangmasukController;
use App\Http\Controllers\KeranjangpeminjamanController;
use App\Http\Controllers\KeranjangruanganController;
use App\Http\Controllers\KeranjangrusakluarController;
use App\Http\Controllers\KeranjangrusakruanganController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\RusakluarController;
use App\Http\Controllers\RusakruanganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-password', [ChangePasswordController::class, 'index']);
Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change.password');

Route::post('/user/update',[UserController::class, 'update']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/user/post', [UserController::class, 'update']);
Route::get('user/json', [UserController::class, 'json']);
Route::resource('user', UserController::class);
Route::resource('barang', BarangController::class);


Route::post('/barang/post', [BarangController::class, 'update']);
Route::get('/barang/delete/{id_barang}', [BarangController::class, 'delete']);
Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit']);
Route::post('/barang/update', [BarangController::class, 'update']);


// ruangan
Route::get('/ruangan', [RuanganController::class, 'index']);
Route::post('/ruangan/store', [RuanganController::class, 'store']);
Route::get('/ruangan/edit/{id_ruangan}', [RuanganController::class, 'edit']);
Route::post('/ruangan/update', [RuanganController::class, 'update']);
Route::get('/ruangan/hapus/{id_ruangan}', [RuanganController::class, 'hapus']);

// Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/store', [KategoriController::class, 'store']);
Route::get('/kategori/edit/{id_Kategori}', [KategoriController::class, 'edit']);
Route::post('/kategori/update', [KategoriController::class, 'update']);
Route::get('/kategori/hapus/{id_Kategori}', [KategoriController::class, 'hapus']);

//users
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::get('/pj',[UserController::class, 'pj']);
Route::post('/store_pj',[UserController::class, 'store_pj']);
Route::get('/pj/edit/{id}',[UserController::class, 'edit_pj']);
Route::post('/user_pj/update/',[UserController::class, 'update_pj']);

Route::get('/rayon',[UserController::class, 'rayon']);
Route::post('/store_rayon',[UserController::class, 'store_rayon']);
Route::get('/rayon/edit/{id}',[UserController::class, 'edit_rayon']);
Route::post('/user_rayon/update/',[UserController::class, 'update_rayon']);

Route::get('/bukan_pj',[UserController::class, 'bukan_pj']);
Route::post('/store_bukan_pj',[UserController::class, 'store_bukan_pj']);
Route::get('/bukan_pj/edit/{id}',[UserController::class, 'edit_bukan_pj']);
Route::post('/user_bukan_pj/update/',[UserController::class, 'update_bukan_pj']);

// Peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/peminjaman/store', [PeminjamanController::class, 'store']);
Route::get('/peminjaman/edit/{id_peminjaman}', [PeminjamanController::class, 'edit']);
Route::get('/peminjaman/status/{id_peminjaman}/{id_barang}', [PeminjamanController::class, 'status']);
Route::get('/peminjaman/detail/{id_peminjaman}', [PeminjamanController::class, 'detail']);
Route::post('/peminjaman/update', [PeminjamanController::class, 'update']);
Route::get('/peminjaman/delete/{id_peminjaman}', [PeminjamanController::class, 'delete']);

//Input Barang Ruangan

Route::get('/input_ruangan', [InputruanganController::class, 'index']);
Route::post('/input_ruangan/store', [InputruanganController::class, 'store']);
Route::get('/input_ruangan/edit/{id_input_ruangan}', [InputruanganController::class, 'edit']);
Route::get('/input_ruangan/detail/{id_input_ruangan}', [InputruanganController::class, 'detail']);
Route::post('/input_ruangan/update', [InputruanganController::class, 'update']);
Route::get('/input_ruangan/delete/{id_input_ruangan}', [InputruanganController::class, 'delete']);

//keluar
Route::get('/keluar', [KeluarController::class, 'index']);
Route::post('/keluar/store', [KeluarController::class, 'store']);
Route::get('/keluar/edit/{id_keluar}', [KeluarController::class, 'edit']);
Route::get('/keluar/detail/{id_keluar}', [KeluarController::class, 'detail']);
Route::post('/keluar/update', [KeluarController::class, 'update']);
Route::get('/keluar/delete/{id_keluar}', [KeluarController::class, 'delete']);

//masuk
Route::get('/masuk', [MasukController::class, 'index']);
Route::post('/masuk/store', [MasukController::class, 'store']);
Route::get('/masuk/edit/{id_masuk}', [MasukController::class, 'edit']);
Route::post('/masuk/update', [MasukController::class, 'update']);
Route::get('/masuk/delete/{id_masuk}', [MasukController::class, 'delete']);
Route::get('/masuk/detail/{id_masuk}', [MasukController::class, 'detail']);

//rusak_ruangan
Route::get('/rusak_ruangan', [RusakruanganController::class, 'index']);
Route::get('/rusak_ruangan/edit/{id_rusak_ruangan}', [RusakruanganController::class, 'edit']);
Route::post('/rusak_ruangan/update', [RusakruanganController::class, 'update']);
Route::get('/rusak_ruangan/delete/{id_rusak_ruangan}', [RusakruanganController::class, 'delete']);
Route::get('/rusak_ruangan/status/{id_rusak_ruangan}/{id_barang_rusak}', [RusakruanganController::class, 'status']);

//rusak_luar
Route::get('/rusak_luar', [RusakluarController::class, 'index']);
Route::get('/rusak_luar/edit/{id_rusak_luar}', [RusakluarController::class, 'edit']);
Route::post('/rusak_luar/update', [RusakluarController::class, 'update']);
Route::get('/rusak_luar/delete/{id_rusak_luar}', [RusakluarController::class, 'delete']);
Route::get('/rusak_luar/status/{id_rusak_luar}/{id_barang_rusak}', [RusakluarController::class, 'status']);



//keranjang_ruangan
Route::get('/keranjang_ruangan', [KeranjangruanganController::class, 'index']);
Route::post('/keranjang_ruangan/store', [KeranjangruanganController::class, 'store']);
Route::get('/keranjang_ruangan/edit/{id_input_ruangan}', [KeranjangruanganController::class, 'edit']);
Route::post('/keranjang_ruangan/update', [KeranjangruanganController::class, 'update']);
Route::get('/keranjang_ruangan/hapus/{id_input_ruangan}', [KeranjangruanganController::class, 'delete']);

//keranjang_keluar
Route::get('/keranjang_keluar', [KeranjangkeluarController::class, 'index']);
Route::post('/keranjang_keluar/store', [KeranjangkeluarController::class, 'store']);
Route::get('/keranjang_keluar/edit/{id_keluar}', [KeranjangkeluarController::class, 'edit']);
Route::post('/keranjang_keluar/update', [KeranjangkeluarController::class, 'update']);
Route::get('/keranjang_keluar/hapus/{id_keluar}', [KeranjangkeluarController::class, 'delete']);

//keranjang_masuk
Route::get('/keranjang_masuk', [KeranjangmasukController::class, 'index']);
Route::post('/keranjang_masuk/store', [KeranjangmasukController::class, 'store']);
Route::get('/keranjang_masuk/edit/{id_masuk}', [KeranjangmasukController::class, 'edit']);
Route::post('/keranjang_masuk/update', [KeranjangmasukController::class, 'update']);
Route::get('/keranjang_masuk/hapus/{id_masuk}', [KeranjangmasukController::class, 'delete']);
Route::get('/keranjang_masuk/form_input', [KeranjangmasukController::class, 'form_input']);
Route::get('/keranjang_masuk/detail_masuk/{id}', [KeranjangmasukController::class, 'detail_masuk']);

//keranjang_peminjaman
Route::get('/keranjang_peminjaman', [KeranjangpeminjamanController::class, 'index']);
Route::post('/keranjang_peminjaman/store', [KeranjangpeminjamanController::class, 'store']);
Route::get('/keranjang_peminjaman/edit/{id_peminjaman}', [KeranjangpeminjamanController::class, 'edit']);
Route::post('/keranjang_peminjaman/update', [KeranjangpeminjamanController::class, 'update']);
Route::get('/keranjang_peminjaman/hapus/{id_peminjaman}', [KeranjangpeminjamanController::class, 'delete']);

//keranjang_rusak ruangan
Route::get('/keranjang_rusak_ruangan', [KeranjangrusakruanganController::class, 'index']);
Route::post('/keranjang_rusak_ruangan/store', [KeranjangrusakruanganController::class, 'store']);
Route::get('/keranjang_rusak_ruangan/edit/{id_rusak}', [KeranjangrusakruanganController::class, 'edit']);
Route::post('/keranjang_rusak_ruangan/update', [KeranjangrusakruanganController::class, 'update']);
Route::get('/keranjang_rusak_ruangan/hapus/{id_rusak}', [KeranjangrusakruanganController::class, 'delete']);

//keranjang_rusak luar
Route::get('/keranjang_rusak_luar', [KeranjangrusakluarController::class, 'index']);
Route::post('/keranjang_rusak_luar/store', [KeranjangrusakluarController::class, 'store']);
Route::get('/keranjang_rusak_luar/edit/{id_rusak}', [KeranjangrusakluarController::class, 'edit']);
Route::post('/keranjang_rusak_luar/update', [KeranjangrusakluarController::class, 'update']);
Route::get('/keranjang_rusak_luar/hapus/{id_rusak}', [KeranjangrusakluarController::class, 'delete']);




//Export
Route::get('/peminjaman/export_excel', [PeminjamanController::class, 'export_excel']);
Route::get('/barang_ruangan/export_excel', [InputruanganController::class, 'export_excel']);
Route::get('/keluar/export_excel', [KeluarController::class, 'export_excel']);
Route::get('/masuk/export_excel', [MasukController::class, 'export_excel']);
Route::get('/lap_barang_keluar/export_excel', [LaporanController::class, 'export_keluar']);
Route::get('/lap_barang_masuk/export_excel', [LaporanController::class, 'export_masuk']);
Route::get('/lap_barang_ruangan/export_excel', [LaporanController::class, 'export_ruangan']);
Route::get('/lap_peminjaman/export_excel', [LaporanController::class, 'export_peminjaman']);
Route::get('/lap_rusak_dalam/export_excel', [LaporanController::class, 'export_rusak_dalam']);
Route::get('/lap_rusak_luar/export_excel', [LaporanController::class, 'export_rusak_luar']);

//Select Insert
Route::get('/inputpeminjaman',[KeranjangpeminjamanController::class, 'input']);
Route::get('/inputmasuk', [KeranjangmasukController::class, 'input']);
Route::get('/inputkeluar', [KeranjangkeluarController::class, 'input']);
Route::get('/inputruangan', [KeranjangruanganController::class, 'input']);
Route::get('/inputrusakruangan', [KeranjangrusakruanganController::class, 'input']);
Route::get('/inputrusakluar', [KeranjangrusakluarController::class, 'input']);

//datatable
Route::get('/barang_json',[DatatableController::class, 'barang_json']);
Route::get('/input_ruangan_json',[DatatableController::class, 'input_ruangan_json']);
Route::get('/keluar_json',[DatatableController::class, 'keluar_json']);
Route::get('/masuk_json',[DatatableController::class, 'masuk_json']);
Route::get('/peminjaman_json',[DatatableController::class, 'peminjaman_json']);
Route::get('/rusak_ruangan_json',[DatatableController::class, 'rusak_ruangan_json']);
Route::get('/rusak_luar_json',[DatatableController::class, 'rusak_luar_json']);




Route::get('/barang/qrcode/{id_barang}',[BarangController::class, 'qrcode']);
Route::get('/lap_barang_masuk',[LaporanController::class, 'lap_barang_masuk']);
Route::post('/lap_barang_masuk_input',[LaporanController::class, 'lap_barang_masuk']);
Route::get('/lap_barang_keluar',[LaporanController::class, 'lap_barang_keluar']);
Route::post('/lap_barang_keluar_input',[LaporanController::class, 'lap_barang_keluar']);
Route::get('/lap_barang_ruangan',[LaporanController::class, 'lap_barang_ruangan']);
Route::post('/lap_barang_ruangan_input',[LaporanController::class, 'lap_barang_ruangan']);
Route::get('/lap_peminjaman',[LaporanController::class, 'lap_peminjaman']);
Route::post('/lap_peminjaman_input',[LaporanController::class, 'lap_peminjaman']);
Route::get('/lap_rusak_luar',[LaporanController::class, 'lap_rusak_luar']);
Route::post('/lap_rusak_luar_input',[LaporanController::class, 'lap_rusak_luar']);
Route::get('/lap_rusak_dalam',[LaporanController::class, 'lap_rusak_dalam']);
Route::post('/lap_rusak_dalam_input',[LaporanController::class, 'lap_rusak_dalam']);


Route::get('/pembimbing',[PembimbingController::class, 'pembimbing']);

//inputrusak pj,pem,notpj
Route::get('/input_rusak_dalam',[InputrusakController::class, 'index_dalam']);
Route::post('/input_rusak_dalam/input',[InputrusakController::class, 'store_dalam']);


Route::get('/input_rusak_luar',[InputrusakController::class, 'index_luar']);
Route::post('/input_rusak_luar/input',[InputrusakController::class, 'store_luar']);



Route::get('/get-state-list',[InputrusakController::class, 'getStateList']);

Route::get('/get-state-list2/{id}',[InputrusakController::class, 'getStateList2']);
