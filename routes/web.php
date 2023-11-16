<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\SuratController;
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

Route::get('/', [LayoutController::class, 'home']);
Route::controller(LayoutController::class)->group(function(){
    Route::get('/layout/home', 'home');
    Route::get('/layout/index', 'index');
});
//surat
Route::get('/surat/index', [SuratController::class, 'index'])->name('index');
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('/surat/store', [SuratController::class, 'store'])->name('surat.store');
Route::get('/surat/unduh/{no_surat}', [SuratController::class, 'unduh'])->name('surat.unduh');
Route::get('/surat/lihat/{no_surat}', [SuratController::class, 'lihat'])->name('surat.lihat');
Route::get('/surat/lihatPDF/{judul}', [SuratController::class, 'lihatPDFByJudul'])->name('surat.lihatPDFByJudul');
Route::post('/surat/editFile/{no_surat}', [SuratController::class, 'editFile'])->name('surat.editFile');
Route::delete('/surat/destroy/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');

//about
Route::get('/about/index', [AboutController::class, 'index'])->name('about.index');

//kategori
Route::get('/kategori/index', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');