@extends('layouts.plantilla')

    @section('contenido')
        <h1>Listado de regiones</h1>

        @foreach ( $regiones as $region )
            <li>{{ $region->regNombre }}</li>
        @endforeach

    @endsection
