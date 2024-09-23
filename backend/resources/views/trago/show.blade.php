
@extends('layouts.plantilla')

@section('vista')
    Trago: {{$trago->nombre}}
@endsection

@section('contenido')
    <div class="table-responsive">
        <table class="table">
            <tbody>
                @can('trago.edit')
                    <tr>
                        <th scope="row">ID</th>
                        <td class="col-12">
                            <p class="show-text">{{$trago->id_trago}}</p>
                        </td>
                    </tr>
                @endcan
                <tr>
                    <th scope="row">Nombre</th>
                    <td class="col-12">
                        <p class="show-text">{{$trago->nombre}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Bar que lo ofrece</th>
                    <td class="col-12">
                        <a class="show-text" href="{{route('bar.show',$trago->bar)}}" style='color: #265301;'>{{$trago->bar->nombre}}</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Ingredientes</th>
                    <td class="col-12">
                        <p class="show-text">{{$trago->ingredientes}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Precio</th>
                    <td class="col-12">
                        <p class="show-text">€{{$trago->precio}}</p>
                    </td>
                </tr>
                @php 
                    $imagen = $trago->archivos_adjuntos
                @endphp
                @if($imagen != null)
                    <tr>
                        <th scope="row">Imagen</th>
                        <td>
                            <ul class="list-group">
                                <div class="md:w-full" style='max-height:512px; max-width:512px;'>
                                    <img class="mw-100 " style="height:100%;width:100%" src="data:image/jpeg;base64,{{$imagen}}" alt="" >
                                </div>
                            </ul>
                        </td>
                    </tr>
                @else
                    <!-- Si no hay imagen cargada, no se muestra el apartado imagen -->
                @endif
                <tr>
                    <th scope="row">Tutoriales</th>
                    <td>
                        @forelse ($trago->tutoriales as $tutorial)
                                <a class="show-text" href="{{route('tutorial.show',$tutorial)}}" style='color: #265301;'>{{$tutorial->nombre}}</a>
                            @empty
                                <p class="show-text" >No hay tutoriales asociados a este trago</p>
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th scope="row">Etiquetas</th>
                    <td class="col-12">
                        @forelse($trago->etiquetas as $etiqueta)
                            <a class="show-text" href="{{route('trago.etiqueta',$etiqueta)}}">{{$etiqueta->nombre}}</a>
                            <br>
                        @empty
                            <p class="show-text">El trago no tiene etiquetas</p>
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    
    <div class="container">
        <div>
            @can('trago.edit')
                <a class="btn btn-dark" href="{{ route('trago.edit',$trago) }}">Editar trago</a>
                <br>
                <br>
            @endcan
            @can('trago.destroy')
                <form action="{{route('trago.destroy',$trago)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark">Borrar trago</button>
                </form>
            @endcan
        </div>
    </div> 
@endsection
