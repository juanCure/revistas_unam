<?php

use App\Http\Controllers\RevistaController;
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

Route::get('/', function () {
	return view('welcome');
});

// Ruta para listar las revistas
Route::get('revistas', [RevistaController::class, 'index'])->name('revistas.index');

// Ruta para crear una revista
Route::get('revistas/create', [RevistaController::class, 'create'])->name('revistas.create');

// Ruta post para almacenar las revistas en un store
Route::post('revistas', [RevistaController::class, 'store'])->name('revistas.store');

// Ruta para visualizar un producto
Route::get('revistas/{revista}', [RevistaController::class, 'show'])->name('revistas.show');

// Ruta para editar un producto
Route::get('revistas/{revista}/edit', [RevistaController::class, 'edit'])->name('revistas.edit');

Route::match(['put', 'patch'], 'revistas/{revista}', [RevistaController::class, 'update'])->name('revistas.update');

Route::delete('revistas/{revista}', [RevistaController::class, 'destroy'])->name('revistas.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
