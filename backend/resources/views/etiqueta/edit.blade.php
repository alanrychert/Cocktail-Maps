@extends('layouts.plantilla')

@section('vista')
    Editar etiqueta
@endsection

@section('contenido')
    <form action="{{route('etiqueta.update',$etiqueta)}}" method="POST">

        @csrf

        @method('PUT')

        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" rows="5" value="{{$etiqueta->nombre}}"></input>
                @error('nombre')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-dark" >Terminar edicion</button>
        <a class="btn btn-dark" href="{{ route('etiqueta.index')}}">Cancelar</a>
    </form>
@endsection
