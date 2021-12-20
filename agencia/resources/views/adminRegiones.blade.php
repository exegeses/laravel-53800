@extends('layouts.plantilla')

    @section('contenido')

        <h1>Panel de administración de regiones</h1>


        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Región</th>
                    <th colspan="2">
                        <a href="/agregarRegion" class="btn btn-outline-secondary">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{ 'idRegion' }}</td>
                    <td>{{ 'regNombre' }}</td>
                    <td>
                        <a href="/modificarRegion/idRegioin" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="/eliminarRegion/idRegion" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>


    @endsection
