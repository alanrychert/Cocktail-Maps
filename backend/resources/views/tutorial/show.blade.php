@extends('layouts.plantilla')

@section('vista')
    Tutorial: {{$tutorial->nombre}}
@endsection

@section('contenido')
    <div class="table-responsive">
        <table class="table">
            <tbody>
                @can('tutorial.edit')
                    <tr>
                        <th scope="row">ID</th>
                        <td class="col-12">
                            <p class="show-text">{{$tutorial->id_tutorial}}</p>
                        </td>
                    </tr>
                @endcan
                <tr>
                    <th scope="row">Nombre</th>
                    <td class="col-12">
                        <p class="show-text">{{$tutorial->nombre}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Autor</th>
                    <td class="col-12">
                        <p class="show-text">{{$tutorial->autor}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Trago</th>
                    <td class="col-12">
                        <a href="{{route('trago.show',$tutorial->trago)}}" style='color: #265301; font-size:large'>{{$tutorial->trago->nombre}}</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Instrucciones</th>
                    <td class="col-12">
                        <p class="show-text">{{$tutorial->descripcion}}</p>
                    </td>
                </tr>
                @php 
                    $imagen = $tutorial->archivos_adjuntos
                @endphp
                @if($imagen != null)
                    <tr>
                        <th scope="row">Imagen</th>
                        <td>
                            <ul class="list-group">
                                <div class="md:w-full " style='max-height:512px; max-width:512px;'>
                                    <img class="mw-100 " style="height:100%;width:100%" src="data:image/jpeg;base64,{{$imagen}} "alt="">
                                </div>
                            </ul>
                        </td>
                    </tr>
                @else
                    <!-- Si no hay imagen cargada, no se muestra el apartado imagen -->
                @endif
                <tr>
                    <th scope="row">Etiquetas</th>
                    <td class="col-12">
                        @forelse($tutorial->etiquetas as $etiqueta)
                            <a class="show-text" href="{{route('tutorial.etiqueta',$etiqueta)}}">{{$etiqueta->nombre}}</a>
                            <br>
                        @empty
                            <p class="show-text">El tutorial no tiene etiquetas</p>
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    
    <div class="container">
        <div>
            @can('tutorial.edit')
                <a class="btn btn-dark" href="{{ route('tutorial.edit',$tutorial) }}">Editar tutorial</a>
                <br>
                <br>
            @endcan
            @can('tutorial.destroy')
                <form action="{{route('tutorial.destroy',$tutorial)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark">Borrar tutorial</button>
                </form>
            @endcan
        </div>
    </div> 
@endsection