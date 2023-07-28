<?php

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

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/dusun', function () {
    return view('dusun');
})->name('dusun');
Route::get('/orangtua', function () {
    return view('orangtua');
})->name('orangtua');
Route::get('/balita', function () {
    return view('balita');
})->name('balita');
Route::get('/penimbangan', function () {
    return view('penimbangan');
})->name('penimbangan');

