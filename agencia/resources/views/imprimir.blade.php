@extends('layouts.plantilla')

    @section('contenido')
        <h1>Imprimir datos y estructuras de control</h1>

        {{-- comentario --}}
        @if( $nombre == 'marcos' )
            bievenido {{ $nombre }}
        @else
            usuario desconocido
        @endif

        <ul>
        @foreach( $marcas as $marca )
            <li>{{ $marca }}</li>
        @endforeach
        </ul>

    @endsection
