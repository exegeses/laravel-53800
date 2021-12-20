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

//Route::get('peticion', accion);
Route::get('/saludo', function ()
{
    return 'hola mundo desde Laravel';
});
Route::get('/test', function ()
{
    return view('prueba');
});
## pantalla de inicio del proyecto
Route::get('/inicio', function ()
{
    return view('inicio');
});
Route::get('/imprimir', function ()
{
    //pasar datos a un vista
    $nombre = 'marcos';
    $marcas = ['Uniqlo', 'Nike', 'Razer', 'Intel', 'Xiaomi', 'AMD'];
    return view('imprimir',
                [
                    'nombre'=>$nombre,
                    'marcas'=>$marcas
                ]
            );
});

############################
### CRUD DE regiones
Route::get('/adminRegiones', function ()
{
    //obtenemos listado de regiones
    $regiones = DB::select('SELECT idRegion, regNombre FROM regiones');
    return view('adminRegiones', [ 'regiones'=>$regiones ]);
});
Route::get('/agregarRegion', function ()
{
    return view('agregarRegion');
});
