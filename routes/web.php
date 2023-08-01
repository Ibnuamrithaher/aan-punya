<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SawController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;

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

Route::resource('registrasi',RegistrasiController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class,'index'])->name('login');
    Route::post('/login', [LoginController::class,'authenticate'])->name('login.authenticate');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class,'logout'])->name('logout');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::resource('alternatif', AlternatifController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('crips', CripsController::class)->except('show');

    Route::get('saw/alternatif', [SawController::class,'alternatif'])->name('saw.alternatif');
    Route::get('saw/hasil', [SawController::class,'hasil'])->name('saw.hasil');
});

