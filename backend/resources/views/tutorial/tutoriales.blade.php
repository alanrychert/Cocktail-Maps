@extends('layouts.plantilla')

@section ('vista')
  Tutoriales
@endsection

@section ('contenido')
<div class='container '>
  <div>
    @can('tutorial.create')
      <a class="btn btn-dark" href="{{ route('tutorial.create') }}">Crear tutorial</a>
    @endcan
  </div>
</div>
<br>
<x-list-group type='tutorial' :collection="$tutoriales" idattribute="id_tutorial">

</x-list-group>

@endsection
