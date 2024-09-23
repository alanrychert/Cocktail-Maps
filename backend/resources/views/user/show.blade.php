@extends('layouts.plantilla')

@section('vista')
    Usuario: {{$user->name}}
@endsection

@section('contenido')
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td class="col-12">
                        <p>{{$user->id}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Nombre</th>
                    <td class="col-12">
                        <p>{{$user->name}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Correo</th>
                    <td class="col-12">
                        <p>{{$user->email}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Correo confirmado</th>
                    <td class="col-12">
                        @if ($user->email_verified_at != null)
                            <p>{{$user->email_verified_at}}</p>
                        @else
                            <p>No</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Roles</th>
                    <td class="col-12">
                        @forelse($user->roles as $role)
                            <p>{{$role->name}}</p>
                            <br>
                        @empty
                            <p>El usuario no tiene roles</p>
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    
    <div class="container">
        <div>
            @can('user.edit')
                <a class="btn btn-dark" href="{{ route('user.edit',$user) }}">Editar usuario</a>
                <br>
                <br>
            @endcan
            @can('user.destroy')
                <form action="{{route('user.destroy',$user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark">Borrar usuario</button>
                </form>
            @endcan
        </div>
    </div> 
@endsection

