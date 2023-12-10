<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;

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

Route::get('/albums', [AlbumsController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumsController::class, 'create'])->name('albums.create');
Route::post('/albums/store', [AlbumsController::class, 'store'])->name('albums.store');
Route::get('/albums/edit/{id}', [AlbumsController::class, 'edit'])->name('albums.edit');
Route::put('/albums/edit/{id}', [AlbumsController::class, 'update'])->name('albums.update');
Route::get('/albums/{id}', [AlbumsController::class, 'show'])->name('albums.show');


Route::get('/photos', [PhotosController::class, 'index'])->name('photos.index');
Route::get('/photos/create/{id}', [PhotosController::class, 'create'])->name('photos.create');
Route::get('/photos/show/{id}', [PhotosController::class, 'show'])->name('photos.show');
Route::post('/photos/store', [PhotosController::class, 'store'])->name('photos.store');
Route::delete('/photos/delete/{id}', [PhotosController::class, 'destroy'])->name('photos.destroy');
