<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\TempatSampahController;
use App\Http\Controllers\UserController;
use App\Models\TempatSampah;

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


Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('wellcome');

Route::get('/alldatalokasi', [UserController::class, 'alldatalokasi'])->name('alldatalokasi');

Route::get('/detail/{id}', [UserController::class, 'show'])->name('detail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    $tempatsampahs = TempatSampah::all();

    return view('home', compact('tempatsampahs'));
})->name('home')->middleware('auth');

Route::resource('tempatsampahs', \App\Http\Controllers\TempatSampahController::class)
->middleware('auth');
