<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses-login', [AuthController::class, 'login'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('/dusun')->group(function () {
        Route::get('/', [DusunController::class, 'index'])->name('dusun.index');
        Route::post('/', [DusunController::class, 'store'])->name('dusun.tambah');
        Route::post('/edit', [DusunController::class, 'update'])->name('dusun.edit');
        Route::get('/delete/{id}', [DusunController::class, 'destroy'])->name('dusun.delete');
    });



    Route::prefix('/orangtua')->group(function () {
        Route::get('/', [OrangTuaController::class, 'index'])->name('ortu.index');
        Route::get('/dusun/{id}', [OrangTuaController::class, 'getDusun'])->name('ortu.dusun');
        Route::post('/', [OrangTuaController::class, 'store'])->name('ortu.tambah');
        Route::post('/edit', [OrangTuaController::class, 'update'])->name('ortu.edit');
        Route::get('/delete/{id}', [OrangTuaController::class, 'destroy'])->name('ortu.delete');
    });

    Route::prefix('/balita')->group(function () {
        Route::get('/', [BalitaController::class, 'index'])->name('balita.index');
        Route::get('/ortu', [BalitaController::class, 'getDataOrtu'])->name('balita.ortu');
        Route::get('/dusun-ortu/{id}', [BalitaController::class, 'getDusunOrtu'])->name('balita.dusun.ortu');
        Route::post('/', [BalitaController::class, 'store'])->name('balita.tambah');
        Route::post('/edit', [BalitaController::class, 'update'])->name('balita.edit');
        Route::get('/delete/{id}', [BalitaController::class, 'destroy'])->name('balita.delete');
    });

    Route::prefix('/penimbangan')->group(function () {
        Route::get('/', [PenimbanganController::class, 'index'])->name('penimbangan.index');
        Route::get('/form/{id}', [PenimbanganController::class, 'form'])->name('penimbangan.form');
        Route::post('/dusun', [PenimbanganController::class, 'showByDusun'])->name('penimbangan.dusun');
        Route::post('/', [PenimbanganController::class, 'store'])->name('penimbangan.tambah');
        Route::post('/edit', [PenimbanganController::class, 'update'])->name('penimbangan.edit');
        Route::get('/delete/{id}', [PenimbanganController::class, 'destroy'])->name('penimbangan.delete');
    });

    Route::prefix('/timbangan-form')->group(function () {
        Route::get('/{id}', [FormController::class, 'index'])->name('form.index');
        Route::post('/new-balita', [FormController::class, 'store'])->name('form.store');
    });

    Route::prefix('/update-timbangan')->group(function () {
        Route::get('/{id}', [FormController::class, 'show'])->name('form.show');
        Route::post('/new', [FormController::class, 'update'])->name('form.update');
    });

    Route::prefix('/export')->group(function () {
        Route::post('/penimbangan', [PenimbanganController::class, 'exportExcel'])->name('penimbangan.export');
    });
});



// Route::prefix('/dusun')->group(function () {
//     Route::get('/', [DusunController::class, 'index'])->name('dusun.index');
//     Route::post('/', [DusunController::class, 'store'])->name('dusun.tambah');
//     Route::post('/edit', [DusunController::class, 'update'])->name('dusun.edit');
//     Route::get('/delete/{id}', [DusunController::class, 'destroy'])->name('dusun.delete');
// });



// Route::prefix('/orangtua')->group(function () {
//     Route::get('/', [OrangTuaController::class, 'index'])->name('ortu.index');
//     Route::get('/dusun/{id}', [OrangTuaController::class, 'getDusun'])->name('ortu.dusun');
//     Route::post('/', [OrangTuaController::class, 'store'])->name('ortu.tambah');
//     Route::post('/edit', [OrangTuaController::class, 'update'])->name('ortu.edit');
//     Route::get('/delete/{id}', [OrangTuaController::class, 'destroy'])->name('ortu.delete');
// });

// Route::prefix('/balita')->group(function () {
//     Route::get('/', [BalitaController::class, 'index'])->name('balita.index');
//     Route::get('/ortu', [BalitaController::class, 'getDataOrtu'])->name('balita.ortu');
//     Route::get('/dusun-ortu/{id}', [BalitaController::class, 'getDusunOrtu'])->name('balita.dusun.ortu');
//     Route::post('/', [BalitaController::class, 'store'])->name('balita.tambah');
//     Route::post('/edit', [BalitaController::class, 'update'])->name('balita.edit');
//     Route::get('/delete/{id}', [BalitaController::class, 'destroy'])->name('balita.delete');
// });

// Route::prefix('/penimbangan')->group(function () {
//     Route::get('/', [PenimbanganController::class, 'index'])->name('penimbangan.index');
//     Route::get('/form/{id}', [PenimbanganController::class, 'form'])->name('penimbangan.form');
//     Route::post('/dusun', [PenimbanganController::class, 'showByDusun'])->name('penimbangan.dusun');
//     Route::post('/', [PenimbanganController::class, 'store'])->name('penimbangan.tambah');
//     Route::post('/edit', [PenimbanganController::class, 'update'])->name('penimbangan.edit');
//     Route::get('/delete/{id}', [PenimbanganController::class, 'destroy'])->name('penimbangan.delete');
// });

// Route::prefix('/timbangan-form')->group(function () {
//     Route::get('/{id}', [FormController::class, 'index'])->name('form.index');
//     Route::post('/new-balita', [FormController::class, 'store'])->name('form.store');
// });

// Route::prefix('/update-timbangan')->group(function () {
//     Route::get('/{id}', [FormController::class, 'show'])->name('form.show');
//     Route::post('/new', [FormController::class, 'update'])->name('form.update');
// });

// Route::prefix('/export')->group(function () {
//     Route::post('/penimbangan', [PenimbanganController::class, 'exportExcel'])->name('penimbangan.export');
// });
