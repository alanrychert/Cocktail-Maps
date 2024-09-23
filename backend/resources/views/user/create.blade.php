
@extends('layouts.plantilla')

@section('vista')
    Crear usuario
@endsection

@section('contenido')
    <form action="{{route('user.store')}}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name= "nombre" id="Nombre" placeholder="Ingrese el nombre de usuario">
                @error('nombre')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="Horarios">Correo</label>
            <input type="text" class="form-control" name= "correo" id="Horarios" placeholder="Ingrese el correo electrónico">
            @error('correo')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
            <label for="Ubicacion">Contraseña</label>
                <input type="password" class="form-control" name="contraseña" placeholder="Ingrese la contraseña">
                @error('contraseña')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label>Listado de roles</label>

            <x-create-relation-checkbox :collection='$roles' relation='roles' mostrar='name'></x-create-relation-checkbox>
            @error('roles')
                <br>
                <small>*Es necesario elegir al menos un rol</small>
                <br>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark" >Enviar</button>
        <a class="btn btn-dark" href="{{ route('user.index')}}">Cancelar</a>
    </form>
@endsection
