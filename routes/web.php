<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\KelurahanArsipSuratController;
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

Route::get('/', [KelurahanArsipSuratController::class, 'index'])->name('surat.index');

Route::get('/about', [AboutController::class, 'index'])->name('about');



Route::get('/surat/create', [KelurahanArsipSuratController::class, 'create'])->name('surat.create');

Route::post('/surat/store', [KelurahanArsipSuratController::class, 'store'])->name('surat.store');

Route::post('/surat/edit', [KelurahanArsipSuratController::class, 'edit'])->name('surat.edit');

Route::get('/surat/{surat}/show', [KelurahanArsipSuratController::class, 'show'])->name('surat.show');

Route::put('/surat/{surat}/update', [KelurahanArsipSuratController::class, 'update'])->name('surat.update');

Route::delete('/surat/{surat}/delete', [KelurahanArsipSuratController::class, 'destroy'])->name('surat.destroy');

Route::get('/surat/download/{surat}', [KelurahanArsipSuratController::class, 'download'])->name('surat.download');

