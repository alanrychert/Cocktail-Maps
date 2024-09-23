@props(['model','collection' =>[],'relation','mostrar' => 'nombre', 'identificador' => 'id'])

@forelse($collection as $elem)
            @if($model->$relation->contains($elem))
                <div>
                    <label class="h4" style='color:black; margin: 3px;'><input type="checkbox" name="{{$relation}}[]" value="{{$elem->$identificador}}" checked>  {{$elem->$mostrar}}</label>
                    <br>
                </div>
            @else
                <div>
                    <label class="h4" style='color:black; margin: 3px;'><input type="checkbox" name="{{$relation}}[]" value="{{$elem->$identificador}}">  {{$elem->$mostrar}}</label>
                    <br>
                </div>
            @endif
@Empty
    <div>
        <label class="h4">No hay {{$relation}} disponibles</label>
    </div>

@endforelse