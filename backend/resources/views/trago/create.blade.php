@extends('layouts.plantilla')

@section('vista')
    Crear trago
@endsection

@section('contenido')
    <form action="{{route('trago.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-sm-12">
            <label for="Horarios">Nombre</label>
            <input type="text" class="form-control" name= "nombre" placeholder="Ingrese el nombre del trago">
            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="dropdown">
            <div class="form-group col-sm-12">
                <label for="Nombre">Bar que lo ofrece</label>
                    <div class="form-group">
                        <select class="block appearance-none w-full mt-1 mb-4 bg-gray-200 border border-dark text-dark py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="id_bar">
                            @foreach ($bares as $bar)
                                <option value="{{ $bar->id_bar }}">{{ $bar->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_bar')
                            <br>
                            <small>*Debe seleccionar un bar</small>
                            <br>
                        @enderror
                    </div>
                </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Ingredientes</label>
                <textarea id="Descripcion" class="form-control" name="ingredientes" rows="5"></textarea>
                @error('ingredientes')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="Horarios">Precio</label>
            <input type="number" class="form-control" name= "precio" placeholder="Ingrese el precio del trago">
            @error('precio')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            <label >Adjuntar una imagen o video</label>
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
        <a class="btn btn-dark" href="{{ route('trago.index')}}">Cancelar</a>
    </form>
@endsection
