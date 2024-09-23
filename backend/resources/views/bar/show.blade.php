@extends('layouts.plantilla')

@section('vista')
    Bar: {{$bar->nombre}}
@endsection

@section('contenido')
    <div class="table-responsive">
        <table class="table">
            <tbody>
                @can('bar.edit')
                    <tr>
                        <th scope="row">ID</th>
                        <td class="col-12">
                            <p class="show-text">{{$bar->id_bar}}</p>
                        </td>
                    </tr>
                @endcan
                <tr>
                    <th scope="row">Nombre</th>
                    <td class="col-12">
                        <p class="show-text">{{$bar->nombre}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Ubicacion</th>
                    <td class="col-12">
                        <p class="show-text">{{$bar->ubicacion}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Horarios</th>
                    <td class="col-12">
                        <p class="show-text">{{$bar->horarios}}</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Descripcion</th>
                    <td class="col-12">
                        <p class="show-text">{{$bar->descripcion}}</p>
                    </td>
                </tr>
                @php 
                    $imagen = $bar->archivos_adjuntos
                @endphp
                @if($imagen != null)
                    <tr>
                        <th scope="row">Imagen</th>
                        <td>
                            <ul class="list-group">
                                <div class="md:w-full" style='max-height:512px; max-width:512px;'>
                                    <img class="img-responsive" style="height:100%;width:100%" src="data:image/jpeg;base64,{{$imagen}}" alt="" >
                                </div>
                            </ul>
                        </td>
                    </tr>
                @else
                    <!-- Si no hay imagen cargada, no se muestra el apartado imagen -->
                @endif
                <tr>
                    <th scope="row">Tragos que ofrece</th>
                    <td class="col-12">
                        @forelse ($bar->tragos as $trago)
                            <a class="show-text" href="{{ route('trago.show',$trago) }}" style='color: #265301;'>{{$trago->nombre}}</a>
                        @empty
                            <p class="show-text">Aún no hay tragos asociados a este bar</p>
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th scope="row">Etiquetas</th>
                    <td class="col-12">
                        @forelse($bar->etiquetas as $etiqueta)
                            <a class="show-text" href="{{ route('bar.etiqueta',$etiqueta) }}">{{$etiqueta->nombre}}</a>
                            <br>
                        @empty
                            <p class="show-text">El bar no tiene etiquetas</p>
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    
    <div class="container">
        <div>
            @can('bar.edit')
                <a class="btn btn-dark" href="{{ route('bar.edit',$bar) }}">Editar bar</a>
                <br>
                <br>
            @endcan
            @can('bar.destroy')
                <form action="{{route('bar.destroy',$bar)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark">Borrar bar</button>
                </form>
            @endcan
        </div>
    </div> 
@endsection

