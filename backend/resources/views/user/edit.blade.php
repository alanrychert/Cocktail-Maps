@extends('layouts.plantilla')

@section('vista')
    Editar {{$user->name}}
@endsection

@section('contenido')
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="Nombre">Nombre</label>
                <p class="form-control">{{$user->name}}</p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="Horarios">Correo</label>
            <p class="form-control">{{$user->email}}</p>
        </div>
    <form action="{{route('user.update',$user)}}" method="POST">
    @csrf

    @method('PUT')
    <div class="form-group col-sm-12">
        <label>Listado de roles</label>

        <x-relation-checkbox :model='$user' :collection='$roles' relation='roles' mostrar='name'></x-relation-checkbox>
        @error('roles')
            <br>
            <small>*Es necesario elegir al menos un rol</small>
            <br>
        @enderror
    </div>
        <button type="submit" class="btn btn-dark" >Terminar edicion</button>
        <a class="btn btn-dark" href="{{ route('user.index')}}">Cancelar</a>
    </form>
@endsection