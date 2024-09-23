@extends('layouts.plantilla')

@section('vista')
    Editar {{$bar->nombre}}
@endsection

@section('contenido')
    <form action="{{route('bar.update',$bar)}}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name= "nombre" id="Nombre" value="{{$bar->nombre}}">
                @error('nombre')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="Horarios">Horarios</label>
            <input type="text" class="form-control" name= "horarios" id="Horarios" value="{{$bar->horarios}}">
            @error('horarios')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
            <label for="Ubicacion">Ubicación</label>
                <input type="text" class="form-control" name="ubicacion" id="Ubicacion" value="{{$bar->ubicacion}}">
                @error('ubicacion')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form group">
            <label for="Descripcion">Descripcion</label>
            <textarea id="Descripcion" class="form-control" name="descripcion" rows="5" >{{$bar->descripcion}}</textarea>
            @error('descripcion')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name= "archivos_adjuntos">
            @error('archivos_adjuntos')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-group">
            <label>Listado de etiquetas</label>
            <x-relation-checkbox :model='$bar' :collection='$etiquetas' relation='etiquetas' mostrar='nombre'></x-relation-checkbox>
        </div>
        <button type="submit" class="btn btn-dark" >Terminar edicion</button>
        <a class="btn btn-dark" href="{{ route('bar.index')}}">Cancelar</a>
    </form>
@endsection