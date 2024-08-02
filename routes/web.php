<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
   // return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
    return view('layout.dashboard');
});
    // Untuk surat masuk
Route::get('/surat-masuk', [SuratMasukController::class, 'index']) -> name('surat-masuk.index');
Route::get('/surat-masuk/create', [SuratMasukController::class, 'create']) -> name('surat-masuk.create');
Route::post('/surat-masuk', [SuratMasukController::class, 'store']) -> name('surat-masuk.store');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show']) -> name('surat-masuk.show');
Route::get('/surat-masuk/{id}/edit', [SuratMasukController::class, 'edit']) -> name('surat-masuk.edit');
Route::put('/surat-masuk/{id}', [SuratMasukController::class, 'update']) -> name('surat-masuk.update');
Route::delete('/surat-masuk/{id}', [SuratMasukController::class, 'destroy']) -> name('surat-masuk.destroy');

// Untuk surat keluar
Route::get('/surat-keluar', [SuratKeluarController::class, 'index']) -> name('surat-keluar.index');
Route::get('/surat-keluar/create', [SuratKeluarController::class, 'create']) -> name('surat-keluar.create');
Route::post('/surat-keluar', [SuratKeluarController::class, 'store']) -> name('surat-keluar.store');
Route::get('/surat-keluar/{id}', [SuratKeluarController::class, 'show']) -> name('surat-keluar.show');
Route::get('/surat-keluar/{id}/edit', [SuratKeluarController::class, 'edit']) -> name('surat-keluar.edit');
Route::put('/surat-keluar/{id}', [SuratKeluarController::class, 'update']) -> name('surat-keluar.update');
Route::delete('/surat-keluar/{id}', [SuratKeluarController::class, 'destroy']) -> name('surat-keluar.destroy');

});



require __DIR__.'/auth.php';
