<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DataPenjualanController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('home','dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('add', [AdminController::class, 'create'])->name('admin.create');
Route::post('store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('admin/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::get('admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::get('/admin/trash', [AdminController::class, 'trash'])->name('admin.trash');
Route::get('admin/softDeleted/{id}', [AdminController::class, 'softDeleted'])->name('admin.softDeleted');
Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/restore/{id}', [AdminController::class, 'restore'])->name('admin.restore');

Route::get('kasir/add', [KasirController::class, 'create'])->name('kasir.create');
Route::post('kasir/store', [KasirController::class, 'store'])->name('kasir.store');
Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
Route::get('kasir/search', [KasirController::class, 'search'])->name('kasir.search');
Route::get('/kasir/trash', [KasirController::class, 'trash'])->name('kasir.trash');
Route::get('kasir/softDeleted/{id}', [KasirController::class, 'softDeleted'])->name('kasir.softDeleted');
Route::get('kasir/edit/{id}', [KasirController::class, 'edit'])->name('kasir.edit');
Route::put('kasir/edit/{id}', [KasirController::class, 'update'])->name('kasir.update');
Route::get('kasir/delete/{id}', [KasirController::class, 'delete'])->name('kasir.delete');
Route::get('/kasir/restore/{id}', [KasirController::class, 'restore'])->name('kasir.restore');

Route::get('transaksi/add', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('transaksi/edit/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::post('transaksi/delete/{id}', [TransaksiController::class, 'delete'])->name('transaksi.delete');
Route::get('transaksi/search', [TransaksiController::class, 'search'])->name('transaksi.search');
Route::get('/transaksi/trash', [TransaksiController::class, 'trash'])->name('transaksi.trash');
Route::get('transaksi/softDeleted/{id}', [TransaksiController::class, 'softDeleted'])->name('transaksi.softDeleted');
Route::get('/transaksi/delete/{id}', [TransaksiController::class, 'delete'])->name('transaksi.delete');
Route::get('/transaksi/restore/{id}', [TransaksiController::class, 'restore'])->name('transaksi.restore');


Route::get('produk/add', [ProdukController::class, 'create'])->name('produk.create');
Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::post('produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
Route::get('produk/search', [ProdukController::class, 'search'])->name('produk.search');
Route::get('/produk/trash', [ProdukController::class, 'trash'])->name('produk.trash');
Route::get('produk/softDeleted/{id}', [ProdukController::class, 'softDeleted'])->name('produk.softDeleted');
Route::get('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
Route::get('/produk/restore/{id}', [ProdukController::class, 'restore'])->name('produk.restore');

Route::get('datapenjualan/add', [DataPenjualanController::class, 'create'])->name('datapenjualan.create');
Route::post('datapenjualan/store', [DataPenjualanController::class, 'store'])->name('datapenjualan.store');
Route::get('/datapenjualan', [DataPenjualanController::class, 'index'])->name('datapenjualan.index');
Route::get('datapenjualan/search', [DataPenjualanController::class, 'search'])->name('datapenjualan.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


});

require __DIR__.'/auth.php';
