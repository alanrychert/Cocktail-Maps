

@extends('layouts.plantilla')

@section ('vista')
  Bares
@endsection

@section ('contenido')
<div class='container '>
  <div>
    @can('bar.create')
      <a class="btn btn-dark" href="{{ route('bar.create') }}">Crear bar</a>
    @endcan
  </div>
</div>
<br>
  <x-list-group type='bar' :collection="$bares" idattribute="id_bar">

  </x-list-group>




@endsection