
@extends('layouts.plantilla')

@section('vista')
    Crear Bar
@endsection

@section('contenido')
    <form action="{{route('bar.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        @method('POST')
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name= "nombre" id="Nombre" placeholder="Ingrese el nombre del bar">
                @error('nombre')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="Horarios">Horarios</label>
            <input type="text" class="form-control" name= "horarios" id="Horarios" placeholder="Ingrese el horario de atención">
            @error('horarios')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
            <label for="Ubicacion">Ubicación</label>
                <input type="text" class="form-control" name="ubicacion" id="Ubicacion" placeholder="Ingrese la ubicación del bar">
                @error('ubicacion')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form group">
            <label for="Descripcion">Descripcion</label>
            <textarea id="Descripcion" class="form-control" name="descripcion" rows="5"></textarea>
            @error('descripcion')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-group">
            <label >Adjuntar una imagen</label>
            <input class="form-control-file" type="file" value="" name="archivos_adjuntos">
            @error('archivos_adjuntos')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            <label>Listado de etiquetas</label>

            <x-create-relation-checkbox :collection='$etiquetas' relation='etiquetas'></x-create-relation-checkbox>
            @error('etiqueta')
                <br>
                <small>*Es necesario elegir al menos una etiqueta</small>
                <br>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark" >Enviar</button>
        <a class="btn btn-dark" href="{{ route('bar.index')}}">Cancelar</a>
    </form>
@endsection
