@extends('layouts.plantilla')



@section ('vista')
  Bares etiquetados con <span style='color:blue'>{{$etiqueta->nombre}}</span>
@endsection

@section ('contenido')

  <x-list-group-solover type='bar' :collection="$bares"></x-list-group-solover>

@endsection