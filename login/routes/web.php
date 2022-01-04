<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

use App\Http\Controllers\MarcaController;
Route::get('adminMarcas', [ MarcaController::class, 'index' ] )
        ->middleware(['auth'])->name('adminMarcas');

Route::view('adminCategorias', 'adminCategorias')->middleware(['auth'])
        ->name('adminCategorias');

require __DIR__.'/auth.php';
