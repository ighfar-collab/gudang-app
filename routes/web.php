<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StokController;
use Illuminate\Support\Facades\Route;
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


Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Proses login (POST)
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

// Logout (POST)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('barang', BarangController::class);
    Route::resource('mutasi', MutasiController::class);
    Route::resource('gudang', GudangController::class);
    Route::resource('stok', StokController::class);
    Route::post('users/{user}/reset-password',
    [UserController::class,'resetPassword']
)->name('admin.users.reset-password');

   Route::put('/user/{user}/make-admin', [UserController::class, 'makeAdmin'])
        ->name('user.makeAdmin');
Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

      Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');


 Route::post('/users/{id}/role', [UserController::class, 'updateRole'])->name('user.updateRole');
  Route::put('/users/{user}/reset-password',
    [UserController::class, 'resetPassword'])->name('user.resetPassword');
     Route::get('/user/{id}/reset', [UserController::class, 'reset'])->name('user.reset');
     
   
});



require __DIR__.'/auth.php';
