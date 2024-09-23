
@extends('layouts.plantilla')

@section ('vista')
  Usuarios
@endsection

@section ('contenido')
<div class='container '>
  <div>
    <a class="btn btn-dark" href="{{ route('user.create') }}">Crear user</a>
  </div>
</div>
<br>
<ul class="list-group">
  @forelse($users as $user)
    <li class="list-group-item ">
      <div class="d-flex p-2 flex-grow-1 bd-highlight align-items-center">
        <div class="col" style="font-size:x-large">
          {{$user->name}}
        </div>
        <div class="col" style="font-size:x-large">
          ID: {{$user->id}}
        </div>
        <div class="d-flex flex-row">
          @can('user.show')
            <div class= "col">
                <a class="btn btn-dark" href="{{ route('user.show',$user) }}">Ver user</a>
            </div>
          @endcan
          @can('user.edit')
            <div class= "col">
              <a class="btn btn-dark" href="{{ route('user.edit',$user) }}">Editar user</a>
            </div>
          @endcan
          @can('user.destroy')
            <div class= "col">
              <form action="{{route('user.destroy',$user)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-dark" user="submit" >Borrar user</button>
              </form>
            </div>
          @endcan
        </div>
      </div>
    </li>
  @empty
    <h1 class="h1"> No hay ningún {{$user}} cargado</h1>
  @endforelse
</ul>

@endsection



