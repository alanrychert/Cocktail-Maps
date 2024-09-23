@extends('layouts.plantilla')

@section('vista')
    Crear tutorial
@endsection

@section('contenido')
    <form action="{{route('tutorial.store')}}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div class="form-group col-sm-12">
            <label for="Horarios">Nombre</label>
            <input type="text" class="form-control" name= "nombre" placeholder="Ingrese el nombre del tutorial">
            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="dropdown">
            <div class="form-group col-sm-12">
                <label for="Nombre">Trago a realizar</label>
                    <div class="form-group">
                        <select class="block appearance-none w-full mt-1 mb-4 bg-gray-200 border border-dark text-dark py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="id_trago">
                            @foreach ($tragos as $trago)
                                <option value="{{ $trago->id_trago }}">{{ $trago->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_trago')
                            <br>
                            <small>*Debe seleccionar un trago</small>
                            <br>
                        @enderror
                    </div>
                </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Autor</label>
                <input type="text" class="form-control" name="autor" rows="5" placeholder="Ingrese el nombre del autor del tutorial"></input>
                @error('autor')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-sm-12">
                <label for="Nombre">Indicaciones</label>
                <textarea id="Descripcion" class="form-control" name="descripcion" rows="5" placeholder="Ingrese las indicaciones para preparar el trago"></textarea>
                @error('descripcion')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label>Adjuntar una imagen</label>
            <input type="file" name= "archivos_adjuntos">
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
        <a class="btn btn-dark" href="{{ route('tutorial.index')}}">Cancelar</a>
    </form>
@endsection
