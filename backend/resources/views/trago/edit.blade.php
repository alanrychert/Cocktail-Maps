@extends('layouts.plantilla')

@section('vista')
    editar trago
@endsection

@section('contenido')
    <h2 style='text-align: center'>Este trago es ofrecido por {{$trago->bar->nombre}}</h2>
    <br>
    <form action="{{route('trago.update',$trago)}}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="form-group col-sm-12">
            <label for="Horarios">Nombre</label>
            <input type="text" class="form-control" name= "nombre" value="{{$trago->nombre}}">
            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Ingredientes</label>
                <textarea id="Descripcion" class="form-control" name="ingredientes" rows="5">{{$trago->ingredientes}}</textarea>
                @error('ingredientes')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="Horarios">Precio</label>
            <input type="text" class="form-control" name= "precio" value="{{$trago->precio}}">
            @error('precio')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-group">
            <label >Adjuntar una imagen o video</label>
            <input type="file" name= "archivos_adjuntos">
            @error('archivos_adjuntos')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-group">
            <label>Listado de etiquetas</label>
            <x-relation-checkbox :model='$trago' :collection='$etiquetas' relation='etiquetas' mostrar='nombre'></x-relation-checkbox>
        </div>
        <button type="submit" class="btn btn-dark" >Terminar edicion</button>
        <a class="btn btn-dark" href="{{ route('trago.index')}}">Cancelar</a>
    </form>
@endsection
