@extends('layouts.plantilla')


@section ('vista')
  Tutoriales etiquetados con <span style='color:blue'>{{$etiqueta->nombre}}</span>
@endsection

@section ('contenido')


<x-list-group-solover type='tutorial' :collection="$tutoriales">

</x-list-group-solover>



@endsection
