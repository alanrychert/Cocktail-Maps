@props(['collection' =>[], 'type' => 'bar','mostrar' => 'nombre','idattribute' => 'id'])

@auth
  <ul class="list-group">
    @forelse($collection as $elem)
      <li class="list-group-item ">
        <div class="d-flex p-2 flex-grow-1 bd-highlight align-items-center">
          <div class="col" style="font-size:x-large">
            {{$elem->$mostrar}}
          </div>
          <div class="col" style="font-size:x-large">
            ID: {{$elem->$idattribute}}
          </div>
          <div class="d-flex flex-row">
            <div class= "col">
                <a class="btn btn-dark" href="{{ route($type.'.show',$elem) }}">Ver {{$type}}</a>
            </div>
            @can($type.'.edit')
              <div class= "col">
                <a class="btn btn-dark" href="{{ route($type.'.edit',$elem) }}">Editar {{$type}}</a>
              </div>
            @endcan
            @can($type.'.destroy')
              <div class= "col">
                <form action="{{route($type.'.destroy',$elem)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-dark" type="submit" >Borrar {{$type}}</button>
                </form>
              </div>
            @endcan
          </div>
        </div>
      </li>
    @empty
      <h1 class="h1"> No hay ningún {{$type}} cargado</h1>
    @endforelse
  </ul>
@else
  <ul class="list-group">
    @forelse($collection as $elem)
      <li class="list-group-item ">
        <div class="d-flex p-2 flex-grow-1 bd-highlight align-items-center">
          <div class="col" style="font-size:x-large">
                  {{$elem->$mostrar}}
          </div>
              <div class="d-flex flex-row">
                  <div class= "col">
                      <a class="btn btn-dark" href="{{ route($type.'.show',$elem) }}">Ver {{$type}}</a>
                  </div>
              </div>
        </div>
      </li>
    @empty
      <h1 class="h1"> No hay ningún {{$type}} cargado</h1>
    @endforelse
  </ul>
@endauth