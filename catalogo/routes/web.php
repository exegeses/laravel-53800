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
// ruta para ver la vista inicio
Route::view('/inicio', 'inicio');

########################################
###  CRUD de marcas
use App\Http\Controllers\MarcaController;
Route::get('/adminMarcas', [ MarcaController::class, 'index' ]);
Route::get('/agregarMarca', [ MarcaController::class, 'create' ]);
Route::post('/agregarMarca', [ MarcaController::class, 'store' ]);
Route::get('/modificarMarca/{id}', [ MarcaController::class, 'edit' ]);
Route::patch('/modificarMarca', [ MarcaController::class, 'update' ]);
Route::get('/eliminarMarca/{id}', [ MarcaController::class, 'confirmarBaja' ]);
Route::delete('/eliminarMarca', [ MarcaController::class, 'destroy' ]);
########################################
###  CRUD de categorías

########################################
###  CRUD de productos
use App\Http\Controllers\ProductoController;
Route::get('/adminProductos', [ ProductoController::class, 'index' ]);
Route::get('/agregarProducto', [ ProductoController::class, 'create' ]);
