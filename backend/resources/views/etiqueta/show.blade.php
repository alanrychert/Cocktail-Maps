@extends('layouts.plantilla')

@section('vista')
    Etiqueta: {{$etiqueta->nombre}}
@endsection

@section('contenido')
    <div class="table-responsive">
        <table class="table">
            <tbody>
                @can('etiqueta.edit')
                    <tr>
                        <th scope="row">ID</th>
                        <td class="col-12">
                            <p>{{$etiqueta->id}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre</th>
                        <td class="col-12">
                            <p>{{$etiqueta->nombre}}</p>
                        </td>
                    </tr>
                @endcan
                <tr>
                    <th scope="row">Con esta etiqueta:</th>
                    <td class="col-12">
                        <a class="btn btn-dark" href="{{ route('bar.etiqueta',$etiqueta) }}">Bares</a>
                        <a class="btn btn-dark" href="{{ route('trago.etiqueta',$etiqueta) }}">Tragos</a>
                        <a class="btn btn-dark" href="{{ route('tutorial.etiqueta',$etiqueta) }}">Tutoriales</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <div class="container">
        <div>
            @can('etiqueta.edit')
                <a class="btn btn-dark" href="{{ route('etiqueta.edit',$etiqueta) }}">Editar etiqueta</a>
            @endcan
            <br>
            <br>
            @can('etiqueta.destroy')
                <form action="{{route('etiqueta.destroy',$etiqueta)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark">Borrar etiqueta</button>
                </form>
            @endcan
        </div>
    </div> 
@endsection