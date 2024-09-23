@extends('layouts.plantilla')

@section('vista')
    Editar tutorial
@endsection

@section('contenido')
    <form action="{{route('tutorial.update',$tutorial)}}" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PUT')

        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" rows="5" value="{{$tutorial->nombre}}"></input>
                @error('nombre')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Autor</label>
                <input type="text" class="form-control" name="autor" rows="5" value="{{$tutorial->autor}}"></input>
                @error('autor')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-sm-12">
                <label for="Nombre">Instrucciones</label>
                <textarea id="Descripcion" class="form-control" name="descripcion" rows="5">{{$tutorial->descripcion}}</textarea>
                @error('descripcion')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label >Adjuntar una imagen</label>
            <input type="file" name= "archivos_adjuntos" >
            @error('archivos_adjuntos')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-group">
            <label>Listado de etiquetas</label>
            <x-relation-checkbox :model='$tutorial' :collection='$etiquetas' relation='etiquetas' mostrar='nombre'></x-relation-checkbox>
        </div>
        <button type="submit" class="btn btn-dark" >Terminar edicion</button>
        <a class="btn btn-dark" href="{{ route('tutorial.index')}}">Cancelar</a>
    </form>
@endsection
