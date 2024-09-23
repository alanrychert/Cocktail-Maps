
@props(['collection' =>[], 'type' => 'bar','mostrar' => 'nombre'])

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
