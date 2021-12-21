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
Route::post('/agregarRegion', function ()
{
    //capturar dato enviado
    $regNombre = $_POST['regNombre'];
    //insertar en tabla regiones
    DB::insert('INSERT INTO regiones
                            ( regNombre )
                        VALUE
                            ( :regNombre )',
                            [ $regNombre ]);
    //retornar reporte de alta ok en nueva view
    return redirect('/adminRegiones')
                ->with([ 'mensaje'=>'Región: '.$regNombre.' agregada correctamente.' ]);
});
Route::get('/modificarRegion/{id}', function ($idRegion)
{
    //obtenemos detos de una región por su id
    /*$region = DB::select('SELECT idRegion, regNombre
                            FROM regiones
                            WHERE idRegion = :idRegion', [ $idRegion ]);*/
    $region = DB::table('regiones')
                    ->where('idRegion', $idRegion)
                    ->first();
    return view('modificarRegion', [ 'region' => $region ]);
});
Route::post('/modificarRegion', function ()
{
    $regNombre = $_POST['regNombre'];
    $idRegion  = $_POST['idRegion'];
    /*DB::update('UPDATE regiones
                    SET regNombre = :regNombre
                    WHERE idRegion = :idRegion',
                         [ $regNombre, $idRegion ]);*/
    DB::table('regiones')
        ->where('idRegion', $idRegion)
        ->update([ 'regNombre'=>$regNombre ]);
    //retornar reporte de alta ok en nueva view
    return redirect('/adminRegiones')
        ->with([ 'mensaje'=>'Región: '.$regNombre.' modificada correctamente.' ]);

});
############################
### CRUD de destinos
Route::get('/adminDestinos', function ()
{
    //obtenemos listado de destinos
    /*$destinos = DB::select('
                    SELECT idDestino, destNombre,
                           regNombre,
                           destPrecio
                        FROM destinos as d
                          JOIN regiones as r
                          ON d.idRegion = r.idRegion
                    ');*/
    $destinos = DB::table('destinos as d')
                    ->select('idDestino', 'destNombre', 'regNombre', 'destPrecio')
                    ->join('regiones as r', 'd.idRegion', '=', 'r.idRegion')
                    ->get();

    return view('adminDestinos', [ 'destinos'=>$destinos ]);
});
Route::get('/agregarDestino', function()
{
    //obtenemos listado de regiones
    $regiones = DB::table('regiones')->get();
    return view('agregarDestino', [ 'regiones'=>$regiones ]);
});
Route::post('/agregarDestino', function ()
{
    //capturamos datos enviados por el form
    $destNombre = $_POST['destNombre'];
    $idRegion = $_POST['idRegion'];
    $destPrecio = $_POST['destPrecio'];
    $destAsientos = $_POST['destAsientos'];
    $destDisponibles = $_POST['destDisponibles'];
    //insertamos
    /*DB::insert(
                'INSERT INTO destinos
                    ( destNombre, idRegion, destPrecio, destAsientos, destDisponibles )
                   VALUE
                    ( :destNombre, :idRegion, :destPrecio, :destAsientos, :destDisponibles )',
                    [ $destNombre, $idRegion, $destPrecio, $destAsientos, $destDisponibles ]
        );*/
    DB::table('destinos')
            ->insert(
                [
                    'destNombre'        =>$destNombre,
                    'idRegion'          =>$idRegion,
                    'destPrecio'        =>$destPrecio,
                    'destAsientos'      =>$destAsientos,
                    'destDisponibles'   =>$destDisponibles
                ]
            );
    //redirección con mensaje ok
    return redirect('/adminDestinos')
        ->with( [ 'mensaje'=>'Destino: '.$destNombre.' agregado correctamente' ] );
});
