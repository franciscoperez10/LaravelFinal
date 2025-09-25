<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\AlbumController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UtilController::class, 'index'])->name('home_name');

Route::get('/add-users', [UserController::class, 'createUser'])->name('users.add');
Route::post('/store-user', [UserController::class, 'storeUser'])->name('users.store');

Route::middleware(['auth'])->group(function() {
    Route::get('dashboard', function() {
        return view('dashboard.dashboard');
    })->name('dashboard');
});


Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create');
Route::post('/bands', [BandController::class, 'store'])->name('bands.store');
Route::get('/bands/{id}', [BandController::class, 'show'])->name('bands.show');
Route::get('/bands/{id}/edit', [BandController::class, 'edit'])->name('bands.edit');
Route::put('/bands/{id}', [BandController::class, 'update'])->name('bands.update');
Route::delete('/bands/{id}', [BandController::class, 'destroy'])->name('bands.destroy');

Route::get('albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('albums', [AlbumController::class, 'store'])->name('albums.store');
Route::get('albums/{id}', [AlbumController::class, 'show'])->name   ('albums.show');
Route::get('albums/{id}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('albums/{id}', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('albums/{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');

Route::fallback(function() {
    return '<h1> Ups, the page you are looking for does not exist. </h1>';
});
