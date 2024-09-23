@extends('layouts.plantilla')

@section ('vista')
  Tragos
@endsection

@section ('contenido')
<div class='container '>
  <div>
    @can('trago.create')
      <a class="btn btn-dark" href="{{ route('trago.create') }}">Crear Trago</a>
    @endcan
  </div>
</div>
<br>
<x-list-group type='trago' :collection="$tragos" idattribute="id_trago">

</x-list-group>

@endsection
