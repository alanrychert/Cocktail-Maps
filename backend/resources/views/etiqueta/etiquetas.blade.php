@extends('layouts.plantilla')

@section ('vista')
  Etiquetas
@endsection

@section ('contenido')
    <div class='container '>
      @can('etiqueta.create')
        <div>
          <a class="btn btn-dark" href="{{ route('etiqueta.create') }}">Crear etiqueta</a>
        </div>
      @endcan
    </div>
    <br>

    <x-list-group type='etiqueta' :collection="$etiquetas">

    </x-list-group>
    <br>

@endsection
