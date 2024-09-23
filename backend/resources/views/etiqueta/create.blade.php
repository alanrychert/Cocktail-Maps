@extends('layouts.plantilla')

@section('vista')
    Crear tutorial
@endsection

@section('contenido')
    <form action="{{route('etiqueta.store')}}" method="POST">
        @csrf

        <div class="form-group col-sm-12">
            <label for="Horarios">Etiqueta</label>
            <input type="text" class="form-control" name= "nombre" placeholder="Ingrese la etiqueta">
            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark" >Enviar</button>
        <a class="btn btn-dark" href="{{ route('etiqueta.index')}}">Cancelar</a>
    </form>
@endsection
