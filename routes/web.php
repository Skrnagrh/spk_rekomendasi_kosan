<?php

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Subkriteria;
use App\Http\Controllers\DataPetugas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\NilaiBobotController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubkriteriaController;

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
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// web.php
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        "title" => 'Dashboard',
        "active" => "dashboard",
        "alternatif" => Alternatif::get()->count(),
        "kriteria" => Kriteria::get()->count(),
        "subkriteria" => Subkriteria::get()->count(),
    ]);
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('/dashboard/kriteria', KriteriaController::class)->middleware('auth');
    Route::resource('/dashboard/alternatif', AlternatifController::class)->middleware('auth');
    Route::resource('/dashboard/subkriteria', SubkriteriaController::class)->middleware('auth');

    Route::resource('/datapengguna', DataPetugas::class)->except('show', 'create');
    // Nilai Bobot
    Route::get('/dashboard/nilai-bobot', [NilaiBobotController::class, 'index'])->name('nilai-bobot.index');
    Route::get('/dashboard/nilai-bobot/create_all', [NilaiBobotController::class, 'create_all'])->name('nilai-bobot.create_all');
    Route::post('/dashboard/nilai-bobot', [NilaiBobotController::class, 'store_all'])->name('nilai-bobot.store_all');
    Route::get('/dashboard/nilai-bobot/{alternatif_id}/edit', [NilaiBobotController::class, 'edit'])->name('nilai-bobot.edit');
    Route::put('/dashboard/nilai-bobot/{alternatif_id}', [NilaiBobotController::class, 'update'])->name('nilai-bobot.update');
    Route::delete('nilai-bobot/{alternatif_id}', [NilaiBobotController::class, 'destroy'])->name('nilai-bobot.destroy');

    // Perhitungan Smart
    Route::get('/dashboard/perhitungan', [PerhitunganController::class, 'index'])->name('smart.index');
    Route::get('/dashboard/hasil', [PerhitunganController::class, 'hasil'])->name('smart.hasil');


    Route::get('/userprofile', [UserController::class, 'index'])->name('profile.index');
    Route::get('/userprofileedit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/prof/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::post('/password', [UserController::class, 'password_action'])->name('password.action');
});
