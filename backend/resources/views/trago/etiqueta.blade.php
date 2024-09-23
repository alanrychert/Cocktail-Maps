@extends('layouts.plantilla')


@section ('vista')
  Tragos etiquetados con <span style='color:blue'>{{$etiqueta->nombre}}</span>
@endsection

@section ('contenido')


<x-list-group-solover type='trago' :collection="$tragos">

</x-list-group-solover>


@endsection
